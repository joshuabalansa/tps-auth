<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- redirecting the page after 10s --}}
    <meta http-equiv="refresh" content="10;url={{ route('customer.index') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Complete</title>
    <link href="{{ asset('assets/images/rabbit-logo.png') }}" rel="icon" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .flip-in-ver-right {
            animation: flip-in-ver-right 1s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        @keyframes flip-in-ver-right {
            0% {
                transform: rotateY(-80deg);
                opacity: 0;
            }

            100% {
                transform: rotateY(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="flip-in-ver-right flex items-center justify-center h-screen">
        <div class="text-center">
            <img src="{{ asset('assets/images/rabbit-logo.png') }}" alt="Rabbit Logo" class="mx-auto w-50 h-50">
            <h1 class="mb-3 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Order
                </span>Complete!</h1>
            <p class="text-2xl font-bold text-gray-900 dark:text-white">
                Order Number:
                {{ session('orderNumber') }}
            </p>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Create a new instance of jsPDF
                var doc = new jsPDF();

                // Add content to the PDF
                doc.text("Hello, this is a PDF generated with jsPDF using jQuery.", 10, 10);

                // Save the PDF
                doc.save("my-pdf.pdf");

                // Optionally, you can also open the PDF in a new tab for printing:
                // doc.autoPrint();
                // window.open(doc.output('bloburl'), '_blank');
            });
        </script>
</body>

</html>
