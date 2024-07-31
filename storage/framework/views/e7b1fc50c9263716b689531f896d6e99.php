<!DOCTYPE html>
<html>
<head>
    <title>Download PDFs</title>
</head>
<body>
    <script>
        // Function to create and download a PDF file from a base64 string
        function downloadPDF(base64, filename) {
            const link = document.createElement('a');
            link.href = 'data:application/pdf;base64,' + base64;
            link.download = filename;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // Base64 encoded PDF content
        const pdf1Base64 = "<?php echo e($pdf1Base64); ?>";
        const pdf2Base64 = "<?php echo e($pdf2Base64); ?>";

        // Filenames
        const timestamp = "<?php echo e($timestamp); ?>";
        const memberName = "<?php echo e($memberName); ?>";
        const pdf1Filename = `tadaAdvance-${memberName}-${timestamp}.pdf`;
        const pdf2Filename = `tadaPriority-${memberName}-${timestamp}.pdf`;

        // Trigger downloads
        downloadPDF(pdf1Base64, pdf1Filename);
        downloadPDF(pdf2Base64, pdf2Filename);

        // Redirect to the desired page after initiating downloads
        window.location.href = "/member-info/tada-advance";
    </script>
</body>
</html>
<?php /**PATH C:\xampp82\htdocs\RCI\resources\views/frontend/member-info/tada-advance/download.blade.php ENDPATH**/ ?>