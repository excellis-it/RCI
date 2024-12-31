<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CsvController extends Controller
{

    public function publicFund()
    {
        $data = 1;
        return view('public-funds.settings.export-data', compact('data'));
    }

    public function imprest()
    {
        $data = 1;
        return view('imprest.settings.export-data', compact('data'));
    }

    public function export(Request $request)
    {
        $request->validate([
            'data_type' => 'required|string',
        ]);

        $dataType = $request->input('data_type');
        $tables = [];

        if ($dataType === 'public-fund') {
            $tables = ['receipts', 'receipt_members', 'cheque_payments','cheque_payment_members'];
        } elseif ($dataType === 'imprest') {
            $tables = ['amounts','cash_in_banks','cash_in_hands','cash_withdrawals','imprest_balance','advance_fund_to_employees','advance_settlements','cda_bill_audit_teams','cda_receipts'];
        } else {
            return response()->json(['error' => 'Invalid data type provided.'], 400);
        }

        return response()->stream(function () use ($tables) {
            $csvFile = fopen('php://output', 'w');
    
            foreach ($tables as $table) {
                $data = DB::table($table)->get()->toArray();
    
                if (count($data)) {
                    fputcsv($csvFile, ["-- $table --"]);
                    foreach ($data as $row) {
                        fputcsv($csvFile, (array) $row);
                    }
                }
            }
    
            fclose($csvFile);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="'.$dataType.'_export.csv"',
        ]);
    }

    public function import(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
            'data_type' => 'required|string',
        ]);
    
        // Get the data type and replace flag from the request
        $dataType = $request->input('data_type');
        $replace = $request->input('replace', false);  // Default to false if not provided
    
        // Get the CSV file path
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));
    
        // Define the tables to import data into based on the data type
        $tables = [];
        if ($dataType == 'public-fund') {
            $tables = ['receipts', 'receipt_members', 'cheque_payments','cheque_payment_members'];
        } elseif ($dataType == 'imprest') {
            $tables = ['amounts', 'cash_in_banks', 'cash_in_hands', 'cash_withdrawals', 'imprest_balance', 'advance_fund_to_employees', 'advance_settlements', 'cda_bill_audit_teams', 'cda_receipts'];
        } else {
            return response()->json(['error' => 'Invalid data type provided.'], 400);
        }
    
        // Loop through each table and process the CSV data
        foreach ($tables as $table) {
            $columns = DB::getSchemaBuilder()->getColumnListing($table);
    
            foreach ($data as $row) {
                // Skip rows that don't have the correct number of columns
                if (count($row) !== count($columns)) {
                    continue;
                }
    
                // Combine the columns and values into an associative array
                $values = array_combine($columns, $row);
    
                // Convert empty strings to null for nullable columns
                foreach ($values as $key => $value) {
                    if ($value === '') {
                        $isNullable = DB::getSchemaBuilder()
                            ->getColumnType($table, $key) !== 'string'; // Example check; improve as needed
    
                        $values[$key] = $isNullable ? null : $value;
                    }
                }
    
                // // Check for existing record by ID if available
                // if (isset($values['id'])) {
                //     $existing = DB::table($table)->where('id', $values['id'])->first();
    
                    
                //         if ($existing) {
                //             // Handle conflict (data exists, return response with conflict info)
                //             return response()->json([
                //                 'conflict' => true,
                //                 'data' => $values,  // The conflicting data
                //                 'table' => $table,   // The table name
                //             ]);
                //         } else {
                //             if ($replace) {
                //                 // Replace the existing record with the new data
                //                 DB::table($table)->where('id', $values['id'])->update($values);
                //             }
                //         }
                    
                // }
                // Check for existing record by ID if available
                // Check for existing record by ID if available
                if (isset($values['id'])) {
                    $existing = DB::table($table)->where('id', $values['id'])->first();

                    if ($existing) {
                        // If record exists, handle conflict resolution
                        if ($replace) {
                            // If replace flag is true, update the existing record with new data
                            DB::table($table)->where('id', $values['id'])->update($values);
                        } else {
                            // If replace flag is false, return a conflict response
                            return response()->json([
                                'conflict' => true,
                                'data' => $values,  // The conflicting data
                                'table' => $table,   // The table name
                            ]);
                        }
                    } else {
                        // If record does not exist, insert the new data
                        DB::table($table)->insert($values);
                    }
                } else {
                    // If no 'id' is provided, insert the data as a new record
                    DB::table($table)->insert($values);
                }


    
                // Insert the new record if no conflict or after conflict resolution
              //  DB::table($table)->insert($values);
            }
        }
    
        return response()->json(['success' => 'Data imported successfully!']);
    }

   

}