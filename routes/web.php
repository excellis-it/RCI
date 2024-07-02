<?php

use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\DesignationController;
use App\Http\Controllers\Frontend\DesignationTypeController;
use App\Http\Controllers\Frontend\PaybandController;
use App\Http\Controllers\Frontend\PaybandTypeController;
use App\Http\Controllers\Frontend\PayscaleController;
use App\Http\Controllers\Frontend\PayscaleTypeController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\LogoController;
use App\Http\Controllers\Frontend\PmLevelController;
use App\Http\Controllers\Frontend\PmIndexController;
use App\Http\Controllers\Frontend\DesigController;
use App\Http\Controllers\Frontend\DivisionController;
use App\Http\Controllers\Frontend\GroupController;
use App\Http\Controllers\Frontend\CadreController;
use App\Http\Controllers\Frontend\FundTypeController;
use App\Http\Controllers\Frontend\QuaterController;
use App\Http\Controllers\Frontend\ExServiceController;
use App\Http\Controllers\Frontend\PgController;
use App\Http\Controllers\Frontend\CgegisController;
use App\Http\Controllers\Frontend\IncomeTaxController;
use App\Http\Controllers\Frontend\BankController;
use App\Http\Controllers\Frontend\LoanController;
use App\Http\Controllers\Frontend\ResetEmployeeIdController;
use App\Http\Controllers\Frontend\PolicyController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\PublicFundController;
use App\Http\Controllers\Frontend\ChequePaymentController;
use App\Http\Controllers\Frontend\CashPaymentController;
use App\Http\Controllers\Frontend\PaymentCategoryController;
use App\Http\Controllers\Frontend\ResetVoucherController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\PayCommissionController;
use App\Http\Controllers\Frontend\DearnessAllowancePercentageController;
use App\Http\Controllers\Frontend\HraController;
use App\Http\Controllers\Frontend\ReportController;
use App\Http\Controllers\Frontend\CityController;
use App\Http\Controllers\Frontend\GpfController;
use App\Http\Controllers\Frontend\GradePayController;
use App\Http\Controllers\Frontend\TptaController;
use App\Http\Controllers\Frontend\CghsController; 

// member info
use App\Http\Controllers\Frontend\MemberInfo\MemberIncomeTaxController;
use App\Http\Controllers\Frontend\MemberInfo\LeaveTypeController;
use App\Http\Controllers\Frontend\MemberInfo\MemberAllotedLeaveController;
use App\Http\Controllers\Frontend\MemberInfo\MemberLeaveController;
use App\Http\Controllers\Frontend\MemberInfo\AttendanceController;

// inventory
use App\Http\Controllers\Inventory\InventoryTypeController;
use App\Http\Controllers\Inventory\ItemCodeController;
use App\Http\Controllers\Inventory\CreditVoucherController;
use App\Http\Controllers\Inventory\DebitVoucherController;
use App\Http\Controllers\Inventory\InventoryProjectController;
use App\Http\Controllers\Inventory\InventoryNumberController;
use App\Http\Controllers\Inventory\ResetItemCodeController;
use App\Http\Controllers\Inventory\GatePassController;
use App\Http\Controllers\Inventory\ConversionVoucherController;
use App\Http\Controllers\Inventory\ExternalIssueVoucherController;
use App\Http\Controllers\Inventory\ItemCodeTypeController;
use App\Http\Controllers\Inventory\SupplyOrderController;
use App\Http\Controllers\Inventory\CreditVoucherNumberController;
use App\Http\Controllers\Inventory\CertificateIssueVoucherController;
use App\Http\Controllers\Inventory\TransferVoucherController;
use App\Http\Controllers\Inventory\RinController;
use App\Http\Controllers\Inventory\DashbaordController as InventoryDashbaordController;
use App\Http\Controllers\Inventory\ReportController as InventoryReportController;

// imprest
use App\Http\Controllers\Imprest\CdaReceiptDetailController;
use App\Http\Controllers\Imprest\ImprestResetVoucherController;
use App\Http\Controllers\Imprest\VariableTypeController;
use App\Http\Controllers\Imprest\ProjectController;
use App\Http\Controllers\Imprest\CdaReceiptController;
use App\Http\Controllers\Imprest\CdaBillAuditTeamController;
use App\Http\Controllers\Imprest\CashWithdrawalController;
use App\Http\Controllers\Imprest\AdvanceSettlementController;
use App\Http\Controllers\Imprest\AdvanceFundController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login-check', [AuthController::class, 'loginCheck'])->name('login-check');

Route::middleware('permssions')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
    // change password
    Route::prefix('password')->group(function () {
        Route::get('/', [ProfileController::class, 'password'])->name('password'); // password change
        Route::post('/update', [ProfileController::class, 'passwordUpdate'])->name('password.update'); // password update
    });

    Route::prefix('logo')->group(function () {
        Route::get('/', [LogoController::class, 'dashboardLogo'])->name('logo.dashboard');
        Route::post('/update',  [LogoController::class, 'logoUpdate'])->name('logo.update');
    });

    Route::resources([
        'categories' => CategoryController::class,
        'payband-types' => PaybandTypeController::class,
        'payscale-types' => PayscaleTypeController::class,
        'payscales' => PayscaleController::class,
        'paybands' => PaybandController::class,
        'designation-types' => DesignationTypeController::class,
        'designations' => DesignationController::class,
        'pm-levels' => PmLevelController::class,
        'pm-index' => PmIndexController::class,
        'divisions' => DivisionController::class,
        'groups' => GroupController::class,
        'cadres' => CadreController::class,
        'fund-types' => FundTypeController::class,
        'quarters' => QuaterController::class, 
        'ex-services' => ExServiceController::class,
        'pgs' => PgController::class,
        'cgegis' => CgegisController::class,
        'banks' => BankController::class,
        'policy' => PolicyController::class,
        'members' => MemberController::class,
        'public-funds' => PublicFundController::class,
        'cash-payments' => CashPaymentController::class, 
        'cheque-payments' => ChequePaymentController::class,
        'payment-categories' => PaymentCategoryController::class,
        'reset-voucher' => ResetVoucherController::class,
        'loans' => LoanController::class,
        'reset-employee-ids' => ResetEmployeeIdController::class,
        'users' => UserController::class,
        'pay-commissions' => PayCommissionController::class,
        'dearness-allowance-percentages' => DearnessAllowancePercentageController::class,
        'hras' => HraController::class,
        'cities' => CityController::class,
        'grade-pays' => GradePayController::class,
        'tptas' => TptaController::class,
        'income-taxes' => IncomeTaxController::class,
        'gpfs'=> GpfController::class,
        'member-income-taxes' => MemberIncomeTaxController::class,
        'cghs' => CghsController::class,
        
    ]);

    //reports route
        //payslip
    Route::get('/reports-payslip', [ReportController::class, 'payslip'])->name('reports.payslip');
    Route::post('/reports-payslip-generate', [ReportController::class, 'payslipGenerate'])->name('reports.payslip-generate');
    Route::get('/generate-payslip', [ReportController::class, 'downloadPayslip'])->name('reports.download-payslip');
       // annual income tax report
    Route::get('/annual-income-tax-report', [ReportController::class, 'annualIncomeTaxReport'])->name('reports.annual-income-tax-report');
    Route::post('/annual-income-tax-report-generate', [ReportController::class, 'annualIncomeTaxReportGenerate'])->name('reports.annual-income-tax-report-generate');
       // paybill
    Route::get('/reports-paybill', [ReportController::class, 'paybill'])->name('reports.paybill');
    Route::post('/reports-paybill-generate', [ReportController::class, 'paybillGenerate'])->name('reports.paybill-generate');
       // salary certificate
    Route::get('/reports-salary-certificate', [ReportController::class, 'salaryCertificate'])->name('reports.salary-certificate');
    Route::post('/reports-salary-certificate-generate', [ReportController::class, 'salaryCertificateGenerate'])->name('reports.salary-certificate-generate');
        // bonus schedule
    Route::get('/reports-bonus-schedule', [ReportController::class, 'bonusSchedule'])->name('reports.bonus-schedule');
    Route::post('/reports-bonus-schedule-generate', [ReportController::class, 'bonusScheduleGenerate'])->name('reports.bonus-schedule-generate');
        // last pay certificate
    Route::get('/reports-last-pay-certificate', [ReportController::class, 'lastPayCertificate'])->name('reports.last-pay-certificate');
    Route::post('/reports-last-pay-certificate-generate', [ReportController::class, 'lastPayCertificateGenerate'])->name('reports.last-pay-certificate-generate');
        
       
    Route::get('/reports-crv', [ReportController::class, 'crv'])->name('reports.crv');
    Route::get('/reports-pl-withdrawl', [ReportController::class, 'plWithdrawl'])->name('reports.pl-withdrawl');

    //user routes
    Route::get('/users-delete/{id}', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/users-fetch-data', [UserController::class, 'fetchData'])->name('users.fetch-data');

    // reset employee ids
    Route::prefix('reset-employee-ids')->group(function () {
        Route::get('/reset-employee-ids-delete/{id}', [ResetEmployeeIdController::class, 'delete'])->name('reset-employee-ids.delete');
    });
    Route::get('/reset-employee-ids-fetch-data', [ResetEmployeeIdController::class, 'fetchData'])->name('reset-employee-ids.fetch-data');

    // category
    Route::prefix('categories')->group(function () {
        Route::get('/categories-delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    });
    Route::get('/categories-fetch-data', [CategoryController::class, 'fetchData'])->name('categories.fetch-data');

    // Payband Type
    Route::prefix('payband-types')->group(function () {
        Route::get('/payband-types-delete/{id}', [PaybandTypeController::class, 'delete'])->name('payband-types.delete');
    });
    Route::get('/payband-types-fetch-data', [PaybandTypeController::class, 'fetchData'])->name('payband-types.fetch-data');

    // Payscale Type
    Route::prefix('payscale-types')->group(function () {
        Route::get('/payscale-types-delete/{id}', [PayscaleTypeController::class, 'delete'])->name('payscale-types.delete');
    });
    Route::get('/payscale-types-fetch-data', [PayscaleTypeController::class, 'fetchData'])->name('payscale-types.fetch-data');

    // Payscale
    Route::prefix('payscales')->group(function () {
        Route::get('/payscales-delete/{id}', [PayscaleController::class, 'delete'])->name('payscales.delete');
    });
    Route::get('/payscales-fetch-data', [PayscaleController::class, 'fetchData'])->name('payscales.fetch-data');

    // Payband
    Route::prefix('paybands')->group(function () {
        Route::get('/paybands-delete/{id}', [PaybandController::class, 'delete'])->name('paybands.delete');
    });
    Route::get('/paybands-fetch-data', [PaybandController::class, 'fetchData'])->name('paybands.fetch-data');

    // Designation Type
    Route::prefix('designation-types')->group(function () {
        Route::get('/designation-types-delete/{id}', [DesignationTypeController::class, 'delete'])->name('designation-types.delete');
    });
    Route::get('/designation-types-fetch-data', [DesignationTypeController::class, 'fetchData'])->name('designation-types.fetch-data');

    // Designation
    Route::prefix('designations')->group(function () {
        Route::get('/designations-delete/{id}', [DesignationController::class, 'delete'])->name('designations.delete');
    });
    Route::get('/designations-fetch-data', [DesignationController::class, 'fetchData'])->name('designations.fetch-data');
    Route::get('/get-payscale-type', [DesignationController::class, 'getPayscaleType'])->name('designations.get-payscale-type');

    // PM Level
    Route::prefix('pm-levels')->group(function () {
        Route::get('/pm-levels-delete/{id}', [PmLevelController::class, 'delete'])->name('pm-levels.delete');
    });
    Route::get('/pm-levels-fetch-data', [PmLevelController::class, 'fetchData'])->name('pm-levels.fetch-data');

    //PM Index
    Route::prefix('pm-index')->group(function () {
        Route::get('/pm-index-delete/{id}', [PmIndexController::class, 'delete'])->name('pm-index.delete');
    });
    Route::get('/pm-index-fetch-data', [PmIndexController::class, 'fetchData'])->name('pm-index.fetch-data');


    //division
    Route::prefix('divisions')->group(function () {
        Route::get('/divisions-delete/{id}', [DivisionController::class, 'delete'])->name('divisions.delete');
    });
    Route::get('/divisions-fetch-data', [DivisionController::class, 'fetchData'])->name('divisions.fetch-data');

    //group
    Route::prefix('groups')->group(function () {
        Route::get('/groups-delete/{id}', [GroupController::class, 'delete'])->name('groups.delete');
    });
    Route::get('/groups-fetch-data', [GroupController::class, 'fetchData'])->name('groups.fetch-data');

    //cadres
    Route::prefix('cadres')->group(function () {
        Route::get('/cadres-delete/{id}', [CadreController::class, 'delete'])->name('cadres.delete');
    });
    Route::get('/cadres-fetch-data', [CadreController::class, 'fetchData'])->name('cadres.fetch-data');

    //fund types
    Route::prefix('fund-types')->group(function () {
        Route::get('/fund-types-delete/{id}', [FundTypeController::class, 'delete'])->name('fund-types.delete');
    });
    Route::get('/fund-types-fetch-data', [FundTypeController::class, 'fetchData'])->name('fund-types.fetch-data');

    //quarters
    Route::prefix('quarters')->group(function () {
        Route::get('/quarters-delete/{id}', [QuaterController::class, 'delete'])->name('quarters.delete');
    });
    Route::get('/quarters-fetch-data', [QuaterController::class, 'fetchData'])->name('quarters.fetch-data');

    //ex-service
    Route::prefix('ex-services')->group(function () {
        Route::get('/ex-services-delete/{id}', [ExServiceController::class, 'delete'])->name('ex-services.delete');
    });
    Route::get('/ex-services-fetch-data', [ExServiceController::class, 'fetchData'])->name('ex-services.fetch-data');

    //pg 
    Route::prefix('pgs')->group(function () {
        Route::get('/pgs-delete/{id}', [PgController::class, 'delete'])->name('pgs.delete');
    });
    Route::get('/pgs-fetch-data', [PgController::class, 'fetchData'])->name('pgs.fetch-data');

    //cgegis
    Route::prefix('cgegis')->group(function () {
        Route::get('/cgegis-delete/{id}', [CgegisController::class, 'delete'])->name('cgegis.delete');
    });
    Route::get('/cgegis-fetch-data', [CgegisController::class, 'fetchData'])->name('cgegis.fetch-data');

    // cghs
    Route::prefix('cghs')->group(function () {
        Route::get('/cghs-delete/{id}', [CghsController::class, 'delete'])->name('cghs.delete');
    });
    Route::get('/cghs-fetch-data', [CghsController::class, 'fetchData'])->name('cghs.fetch-data');

    //bank route
    Route::prefix('banks')->group(function () {
        Route::get('/banks-delete/{id}', [BankController::class, 'delete'])->name('banks.delete');
    });
    Route::get('/banks-fetch-data', [BankController::class, 'fetchData'])->name('banks.fetch-data');

    //loans route
    Route::prefix('loans')->group(function () {
        Route::get('/loans-delete/{id}', [LoanController::class, 'delete'])->name('loans.delete');
    });
    Route::get('/loans-fetch-data', [LoanController::class, 'fetchData'])->name('loans.fetch-data');

    // policy route
    Route::prefix('policy')->group(function () {
        Route::get('/policy-delete/{id}', [PolicyController::class, 'deletePolicy'])->name('policy.delete');
    });
    Route::get('/policy-fetch-data',[PolicyController::class, 'fetchData'])->name('policy.fetch-data');

    //city routes
    Route::prefix('cities')->group(function () {
        Route::get('/cities-delete/{id}', [CityController::class, 'delete'])->name('cities.delete');
    });
    Route::get('/cities-fetch-data', [CityController::class, 'fetchData'])->name('cities.fetch-data');

    Route::get('/gpfs-fetch-data', [GpfController::class, 'fetchData'])->name('gpfs.fetch-data');

    // memeber route
    Route::get('/members-delete/{id}', [MemberController::class, 'deleteMember'])->name('members.delete');
    Route::get('/members-fetch-data', [MemberController::class, 'fetchData'])->name('members.fetch-data');
    //member credit update
    Route::post('/members-credit-update',[MemberController::class,'memberCreditUpdate'])->name('members.credit.update');
    Route::post('/members-credit-da-percentage',[MemberController::class,'memberCreditDaPercentage'])->name('members.credit.da-percentage');
    //member debit update
    Route::post('/members-debit-update',[MemberController::class,'memberDebitUpdate'])->name('members.debit.update');
    Route::post('/members-debit-edu-cess',[MemberController::class,'memberDebitEducationCess'])->name('members.debit.get-edu-cess');
    //member recovery update
    Route::post('/members-recovery-update',[MemberController::class,'memberRecoveryUpdate'])->name('members.recovery.update');
    Route::delete('/members-recovery-delete/{id}',[MemberController::class, 'memberRecoveryDelete'])->name('members.recovery-delete');

    Route::get('/member-loans-emi-info',[MemberController::class,'memberLoanEmiInfo'])->name('members-loan.emi-info');
    Route::post('/members-loan-list',[MemberController::class,'memberLoanList'])->name('members.get-loan-from-member');
    Route::post('/members-loan-emi-submit',[MemberController::class,'memberLoanEmiSubmit'])->name('members.loans-emi-submit');
    Route::post('/loan-emi-list', [MemberController::class, 'fetchEmiList'])->name('members.loan-emi-list');

    //member check credit availability
    Route::post('/members-check-credit-availability',[MemberController::class,'memberCheckCreditAvailability'])->name('members.check-credit-available');

    //member recovery original route
    Route::post('/members-recovery-original-update',[MemberController::class,'memberRecoveryOriginalUpdate'])->name('members.recovery-original.update');

    // members.loan.get-loan


    //member expectation route
    Route::post('/members-expectation-store',[MemberController::class,'memberExpectationStore'])->name('members.expectation.store');
    Route::get('/members-expectation-edit/{id}',[MemberController::class,'memberExpectationEdit'])->name('members.expectation.edit');
    Route::post('/members-expectation-update',[MemberController::class,'memberExpectationUpdate'])->name('members.expectation.update');
    Route::delete('/members-expectation-delete/{id}',[MemberController::class, 'memberExpectationDelete'])->name('members.expectation-delete');
    //member core-info update
    Route::post('/members-core-info-update',[MemberController::class,'memberCoreInfoUpdate'])->name('members.core-info.update');

    Route::post('/get-members-grade-pay',[MemberController::class,'getMemberGradePay'])->name('members.grade-pay');
    Route::post('/get-members-cgegis-value',[MemberController::class,'getmemberCgegisvalue'])->name('members.get-cgegis-value');
    Route::post('/get-members-category-value',[MemberController::class,'getmemberCategoryValue'])->name('members.get-category-value');

    //member loan info
    Route::post('/members-loan-info-store',[MemberController::class,'memberLoanInfoStore'])->name('members.loan.store');
    //member loan edit
    Route::get('/members-loan-edit/{id}',[MemberController::class,'memberLoanEdit'])->name('members.loan.edit');

    //member personal info
    Route::post('/members-policy-info-store',[MemberController::class,'memberPolicyInfoStore'])->name('members.policy-info.submit');
    Route::get('/members-policy-info-edit/{id}',[MemberController::class,'memberPolicyInfoEdit'])->name('members.policy-info.edit');
    Route::post('/members-policy-info-update',[MemberController::class,'memberPolicyInfoUpdate'])->name('members.policy-info.update');
    Route::delete('/members-policy-info-delete/{id}',[MemberController::class, 'memberPolicyInfoDelete'])->name('members.policy-info.delete');
    //member personal update
    Route::post('/members-loan-update',[MemberController::class,'memberLoanUpdate'])->name('members.loan.update');
    Route::delete('/members-loan-delete/{id}',[MemberController::class, 'memberLoanDelete'])->name('members.loan.delete');
    Route::post('/members-personal-update',[MemberController::class,'memberPersonalUpdate'])->name('members.personal.update');

    //member income tax
    Route::prefix('member-income-taxes')->group(function () {
        Route::get('/member-income-taxes-delete/{id}', [MemberIncomeTaxController::class, 'delete'])->name('member-income-taxes.delete');
    });
    Route::get('/member-income-taxes-fetch-data', [MemberIncomeTaxController::class, 'fetchData'])->name('member-income-taxes.fetch-data');

    // pay commission
    Route::prefix('pay-commissions')->group(function () {
        Route::get('/pay-commissions-delete/{id}', [PayCommissionController::class, 'delete'])->name('pay-commissions.delete');
    });
    Route::get('/pay-commissions-fetch-data', [PayCommissionController::class, 'fetchData'])->name('pay-commissions.fetch-data');

    //dearness allowance percentage
    Route::prefix('dearness-allowance-percentages')->group(function () {
        Route::get('/dearness-allowance-percentages-delete/{id}', [DearnessAllowancePercentageController::class, 'delete'])->name('dearness-allowance-percentages.delete');
    });
    Route::get('/dearness-allowance-percentages-fetch-data', [DearnessAllowancePercentageController::class, 'fetchData'])->name('dearness-allowance-percentages.fetch-data');

    //hra
    Route::prefix('hras')->group(function () {
        Route::get('/hras-delete/{id}', [HraController::class, 'delete'])->name('hras.delete');
    });
    Route::get('/hras-fetch-data', [HraController::class, 'fetchData'])->name('hras.fetch-data');

    //tpta
    Route::prefix('tptas')->group(function () {
        Route::get('/tptas-delete/{id}', [TptaController::class, 'delete'])->name('tptas.delete');
    });
    Route::get('/tptas-fetch-data', [TptaController::class, 'fetchData'])->name('tptas.fetch-data');
    Route::post('/tptas-da-percentage', [TptaController::class, 'daPercentageCalculation'])->name('tptas.da-percentage');

    //income tax
    Route::prefix('income-taxes')->group(function () {
        Route::get('/income-taxes-delete/{id}', [IncomeTaxController::class, 'delete'])->name('income-taxes.delete');
    });
    Route::get('/income-taxes-fetch-data', [IncomeTaxController::class, 'fetchData'])->name('income-taxes.fetch-data');

    //payment category
    Route::prefix('payment-categories')->group(function () {
        Route::get('/payment-categories-delete/{id}', [PaymentCategoryController::class, 'delete'])->name('payment-categories.delete');
    });
    Route::get('/payment-categories-fetch-data', [PaymentCategoryController::class, 'fetchData'])->name('payment-categories.fetch-data');

    //cash payment
    Route::prefix('cash-payments')->group(function () {
        Route::get('/cash-payments-delete/{id}', [CashPaymentController::class, 'delete'])->name('cash-payments.delete');
    });
    Route::get('/cash-payments-fetch-data', [CashPaymentController::class, 'fetchData'])->name('cash-payments.fetch-data');

    //cheque payment
    Route::prefix('cheque-payments')->group(function () {
        Route::get('/cheque-payments-delete/{id}', [ChequePaymentController::class, 'delete'])->name('cheque-payments.delete');
    });
    Route::get('/cheque-payments-fetch-data', [ChequePaymentController::class, 'fetchData'])->name('cheque-payments.fetch-data');

    //reset voucher
    Route::prefix('reset-voucher')->group(function () {
        Route::get('/reset-voucher-delete/{id}', [ResetVoucherController::class, 'delete'])->name('reset-voucher.delete');
    });

    Route::get('/reset-voucher-fetch-data', [ResetVoucherController::class, 'fetchData'])->name('reset-voucher.fetch-data');
    Route::get('/edit-member',[MemberController::class,'editMember'])->name('edit.member');
    // Route::get('/income-tax',[IncomeTaxController::class,'index'])->name('income-tax');

    // member info routes
    Route::prefix('member-info')->group(function () {
        Route::resources([
            'leave-type' => LeaveTypeController::class,
            'member-alloted-leave' => MemberAllotedLeaveController::class,
            'member-leaves' => MemberLeaveController::class,
            'attendances' => AttendanceController::class,
        ]);

        // leave type
        Route::prefix('leave-type')->group(function () {
            Route::get('/leave-type-delete/{id}', [LeaveTypeController::class, 'delete'])->name('leave-type.delete');
        });
        Route::get('/leave-type-fetch-data', [LeaveTypeController::class, 'fetchData'])->name('leave-type.fetch-data');

        // member alloted leave
        Route::prefix('member-alloted-leave')->group(function () {
            Route::get('/member-alloted-leave-delete/{id}', [MemberAllotedLeaveController::class, 'delete'])->name('member-alloted-leave.delete');
        });
        Route::get('/member-alloted-leave-fetch-data', [MemberAllotedLeaveController::class, 'fetchData'])->name('member-alloted-leave.fetch-data');

        // member leaves
        Route::prefix('member-leaves')->group(function () {
            Route::get('/member-leaves-delete/{id}', [MemberLeaveController::class, 'delete'])->name('member-leaves.delete');
        });
        Route::get('/member-leaves-fetch-data', [MemberLeaveController::class, 'fetchData'])->name('member-leaves.fetch-data');
        Route::post('/member-leaves-year-search', [MemberLeaveController::class, 'yearSearch'])->name('member-leaves.year-search');
        Route::get('/get-alloted-leaves', [MemberLeaveController::class, 'getAllotedLeaves'])->name('member-leaves.get-alloted-leaves');
        Route::get('/leave-fetch-data', [MemberLeaveController::class, 'leaveFetchData'])->name('member-leaves.leave-fetch-data');
        Route::get('/leave-list', [MemberLeaveController::class, 'memberLeaves'])->name('member-leaves.leave-list');

        // attendance
        Route::prefix('attendances')->group(function () {
            Route::get('/attendances-delete/{id}', [AttendanceController::class, 'delete'])->name('attendances.delete');
        });
        Route::get('/attendances-fetch-data', [AttendanceController::class, 'fetchData'])->name('attendances.fetch-data');
        Route::post('/member-attendances', [AttendanceController::class, 'memberAttendances'])->name('attendances.member-attendances');
    });

    // imprest routes
    Route::prefix('imprest')->group(function () {
        Route::resources([
            'cda-receipt-details' => CdaReceiptDetailController::class,
            'imprest-reset-voucher' => ImprestResetVoucherController::class,
            'variable-type' => VariableTypeController::class,
            'project' => ProjectController::class,
            'cda-receipts' => CdaReceiptController::class,
            'cda-bills' => CdaBillAuditTeamController::class,
            'cash-withdrawals' => CashWithdrawalController::class,
            'advance-settlement' => AdvanceSettlementController::class,
            'advance-funds' => AdvanceFundController::class,
        ]);

        // cda receipt details
        Route::prefix('cda-receipt-details')->group(function () {
            Route::get('/cda-receipt-details-delete/{id}', [CdaReceiptDetailController::class, 'delete'])->name('cda-receipt-details.delete');
        });
        Route::get('/cda-receipt-details-fetch-data', [CdaReceiptDetailController::class, 'fetchData'])->name('cda-receipt-details.fetch-data');

        // imprest reset voucher
        Route::prefix('imprest-reset-voucher')->group(function () {
            Route::get('/imprest-reset-voucher-delete/{id}', [ImprestResetVoucherController::class, 'delete'])->name('imprest-reset-voucher.delete');
        });
        Route::get('/imprest-reset-voucher-fetch-data', [ImprestResetVoucherController::class, 'fetchData'])->name('imprest-reset-voucher.fetch-data');

        // variable type
        Route::prefix('variable-type')->group(function () {
            Route::get('/variable-type-delete/{id}', [VariableTypeController::class, 'delete'])->name('variable-type.delete');
        });
        Route::get('/variable-type-fetch-data', [VariableTypeController::class, 'fetchData'])->name('variable-type.fetch-data');

        // project
        Route::prefix('project')->group(function () {
            Route::get('/project-delete/{id}', [ProjectController::class, 'delete'])->name('project.delete');
        });
        Route::get('/project-fetch-data', [ProjectController::class, 'fetchData'])->name('project.fetch-data'); 

        // cda receipt
        Route::prefix('cda-receipts')->group(function () {
            Route::get('/cda-receipts-delete/{id}', [CdaReceiptController::class, 'delete'])->name('cda-receipts.delete');
        });
        Route::get('/cda-receipts-fetch-data', [CdaReceiptController::class, 'fetchData'])->name('cda-receipts.fetch-data');

        //cda bills
        Route::prefix('cda-bills')->group(function () {
            Route::get('/cda-bills-delete/{id}', [CdaBillAuditTeamController::class, 'delete'])->name('cda-bills.delete');
        });
        Route::get('/cda-bills-fetch-data', [CdaBillAuditTeamController::class, 'fetchData'])->name('cda-bills.fetch-data');

        //cash withdrawal
        Route::prefix('cash-withdrawals')->group(function () {
            Route::get('/cash-withdrawals-delete/{id}', [CashWithdrawalController::class, 'delete'])->name('cash-withdrawals.delete');
        });

        Route::get('/cash-withdrawals-fetch-data', [CashWithdrawalController::class, 'fetchData'])->name('cash-withdrawals.fetch-data');

        //advance fund
        Route::prefix('advance-funds')->group(function () {
            Route::get('/advance-funds-delete/{id}', [AdvanceFundController::class, 'delete'])->name('advance-funds.delete');
        });
        Route::get('/advance-funds-fetch-data', [AdvanceFundController::class, 'fetchData'])->name('advance-funds.fetch-data');

        //advance settlement
        Route::prefix('advance-settlement')->group(function () {
            Route::get('/advance-settlement-delete/{id}', [AdvanceSettlementController::class, 'delete'])->name('advance-settlement.delete');
        });

        Route::get('/advance-settlement-fetch-data', [AdvanceSettlementController::class, 'fetchData'])->name('advance-settlement.fetch-data');

        Route::post('/advance-settlement-bill-store', [AdvanceSettlementController::class, 'storeAdvanceSettleBill'])->name('advance-settle-bills.store');
        Route::get('/advance-settlement-bills-edit/{id}', [AdvanceSettlementController::class, 'editAdvanceSettlementBill'])->name('advance-settlement-bills.edit');
        Route::post('/advance-settlement-bill-update', [AdvanceSettlementController::class, 'updateAdvanceSettleBill'])->name('advance-settle-bills.update');
        //delete advance settylement
        Route::get('/advance-settlement-bill-delete/{id}', [AdvanceSettlementController::class, 'deleteAdvanceSettleBill'])->name('advance-settle-bills.delete');

    });

    //grade pay routes
    Route::get('/grade-pays-fetch-data', [GradePayController::class, 'fetchData'])->name('grade-pays.fetch-data');

    
    // inventory routes
    Route::prefix('inventory')->group(function () {
        Route::group(['middleware' => 'material'], function () {
            Route::resources([
                'item-codes' => ItemCodeController::class,
                'inventory-types' => InventoryTypeController::class,
                'inventory-projects' => InventoryProjectController::class,
                'inventory-numbers' => InventoryNumberController::class,
                'credit-vouchers' => CreditVoucherController::class,
                'debit-vouchers' => DebitVoucherController::class,
                'reset-codes' => ResetItemCodeController::class,
                'gate-passes' => GatePassController::class,
                'conversion-vouchers' => ConversionVoucherController::class,
                'external-issue-vouchers' => ExternalIssueVoucherController::class,
                'transfer-vouchers' => TransferVoucherController::class,
                'item-code-types' => ItemCodeTypeController::class,
                'rins' => RinController::class,
                'supply-orders' => SupplyOrderController::class,
                'credit-voucher-numbers' => CreditVoucherNumberController::class,
                'certificate-issue-vouchers' => CertificateIssueVoucherController::class,
            ]);

            // report routes
                // credit voucher
            Route::post('/reports-credit-voucher', [InventoryReportController::class, 'creditVoucherGenerate'])->name('reports.credit-voucher');
                // debit voucher
            Route::post('/reports-debit-voucher', [InventoryReportController::class, 'debitVoucherGenerate'])->name('reports.debit-voucher');

            //reset item codes
            Route::prefix('reset-codes')->group(function () {
                Route::get('/delete/{id}', [ResetItemCodeController::class, 'delete'])->name('reset-codes.delete');
            });
            Route::get('/reset-codes-fetch-data', [ResetItemCodeController::class, 'fetchData'])->name('reset-codes.fetch-data');

            //item-codes
            Route::get('/item-codes-fetch-data', [ItemCodeController::class, 'fetchData'])->name('item-codes.fetch-data');
            Route::prefix('item-codes')->group(function () {
                Route::get('/delete/{id}', [ItemCodeController::class, 'delete'])->name('item-codes.delete');
            });

            Route::get('/inventory-types-fetch-data',[InventoryTypeController::class, 'fetchData'])->name('inventory-types.fetch-data');
            Route::prefix('inventory-types')->group(function () {
                Route::get('/delete/{id}', [InventoryTypeController::class, 'delete'])->name('inventory-types.delete');
            });

            Route::get('/inventory-projects-fetch-data', [InventoryProjectController::class, 'fetchData'])->name('inventory-projects.fetch-data');
            Route::prefix('inventory-projects')->group(function () {
                Route::get('/delete/{id}', [InventoryProjectController::class, 'delete'])->name('inventory-projects.delete');
            });

            Route::get('/inventory-numbers-fetch-data', [InventoryNumberController::class, 'fetchData'])->name('inventory-numbers.fetch-data');
            Route::prefix('inventory-numbers')->group(function () {
                Route::get('/delete/{id}', [InventoryNumberController::class, 'delete'])->name('inventory-numbers.delete');
            });

            //credit-vouchers
            Route::get('/credit-vouchers-fetch-data', [CreditVoucherController::class, 'fetchData'])->name('credit-vouchers.fetch-data');
            Route::get('/credit-vouchers-delete/{id}', [CreditVoucherController::class, 'delete'])->name('credit-vouchers.delete');
            Route::post('/get-item-type', [CreditVoucherController::class, 'getItemType'])->name('credit-vouchers.get-item-type');

            //debit-vouchers
            Route::get('/debit-vouchers-fetch-data', [DebitVoucherController::class, 'fetchData'])->name('debit-vouchers.fetch-data');
            Route::get('/debit-vouchers-delete/{id}', [DebitVoucherController::class, 'delete'])->name('debit-vouchers.delete');
            Route::post('/get-item-quantity', [DebitVoucherController::class, 'getItemQuantity'])->name('debit-vouchers.get-item-quantity');
            Route::post('/get-items-by-inv-no', [DebitVoucherController::class, 'getItemsByInvNo'])->name('debit-vouchers.get-items-by-inv-no');

            //gate-passes
            Route::get('/gate-passes-fetch-data', [GatePassController::class, 'fetchData'])->name('gate-passes.fetch-data');
            Route::get('/gate-passes-delete/{id}', [GatePassController::class, 'delete'])->name('gate-passes.delete');

            //conversion-vouchers
            Route::get('/conversion-vouchers-fetch-data', [ConversionVoucherController::class, 'fetchData'])->name('conversion-vouchers.fetch-data');
            Route::post('/conversion-vouchers-item-quant', [ConversionVoucherController::class, 'getItemQuantity'])->name('conversion-vouchers.get-item-quantity');
            Route::post('/conversion-vouchers-quantity-validation', [ConversionVoucherController::class, 'getItemQuantityValidation'])->name('conversion-vouchers.quantity-validation');
            Route::get('/conversion-vouchers-delete/{id}', [ConversionVoucherController::class, 'deleteConversionVoucher'])->name('conversion-vouchers.delete');

            //transfer voucher
            Route::get('/transfer-vouchers-fetch-data', [TransferVoucherController::class, 'fetchData'])->name('transfer-vouchers.fetch-data');
            Route::get('/transfer-vouchers-delete/{id}', [TransferVoucherController::class, 'delete'])->name('transfer-vouchers.delete');

            //external-issue-vouchers
            Route::get('/external-issue-vouchers-fetch-data', [ExternalIssueVoucherController::class, 'fetchData'])->name('external-issue-vouchers.fetch-data');
            Route::get('/external-issue-vouchers-delete/{id}', [ExternalIssueVoucherController::class, 'delete'])->name('external-issue-vouchers.delete');

            //item-code-types
            Route::get('/item-code-types-fetch-data', [ItemCodeTypeController::class, 'fetchData'])->name('item-code-types.fetch-data');
            Route::prefix('item-code-types')->group(function () {
                Route::get('/delete/{id}', [ItemCodeTypeController::class, 'delete'])->name('item-code-types.delete');
            });

            //rins
            Route::get('/rins-fetch-data', [RinController::class, 'fetchData'])->name('rins.fetch-data');
            Route::prefix('rins')->group(function () {
                Route::get('/delete/{id}', [RinController::class, 'delete'])->name('rins.delete');
            });
            Route::post('/get-item-description', [RinController::class, 'getItemDescription'])->name('rins.get-item-description');

            //supply-orders
            Route::get('/supply-orders-fetch-data', [SupplyOrderController::class, 'fetchData'])->name('supply-orders.fetch-data');
            Route::prefix('supply-orders')->group(function () {
                Route::get('/delete/{id}', [SupplyOrderController::class, 'delete'])->name('supply-orders.delete');
            });

            //credit-voucher-numbers
            Route::get('/credit-voucher-numbers-fetch-data', [CreditVoucherNumberController::class, 'fetchData'])->name('credit-voucher-numbers.fetch-data');
            Route::prefix('credit-voucher-numbers')->group(function () {
                Route::get('/delete/{id}', [CreditVoucherNumberController::class, 'delete'])->name('credit-voucher-numbers.delete');
            });

            //certificate-issue-vouchers
            Route::get('/certificate-issue-vouchers-fetch-data', [CertificateIssueVoucherController::class, 'fetchData'])->name('certificate-issue-vouchers.fetch-data');
            Route::prefix('certificate-issue-vouchers')->group(function () {
                Route::get('/delete/{id}', [CertificateIssueVoucherController::class, 'delete'])->name('certificate-issue-vouchers.delete');
            });
            Route::get('/get-item-type', [CertificateIssueVoucherController::class, 'getItemType'])->name('certificate-issue-vouchers.get-item-type');
        });
        
    });
   
});
