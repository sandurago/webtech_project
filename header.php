<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        orange: '#F29F58',
                        maroon: '#AB4459',
                        purple: '#441752',
                        lightpurple: '#5a3068',
                        black: '#1B1833',
                        lavender: '#C6B3D2',
                        turquoise: '#A8DADC',
                        coral: '#F4B794',
                    }
                }
            }
        }

        // Otwiera i zamyka nawigacje w wersji mobilnej
        function toggle() {
            const mobile = document.querySelector('#mobile');
            const classList = mobile.classList;
            if(classList.contains('hidden')) {
                classList.remove('hidden');
                classList.add('flex');
            } else {
                classList.remove('flex');
                classList.add('hidden');
            }
        }

    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo:ital,wght@0,100..900;1,100..900&family=Monoton&family=Russo+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/style.css">
    <title>DreamMo</title>
</head>
<body class="exo-300">
<nav class="py-4 flex flex-col items-center justify-center lg:flex-row lg:items-center">
    <h1 class="p-4 text-5xl monoton text-orange">
        <a href="/index.php">DreamMO</a>
    </h1>
    <button onclick="toggle()" class="lg:hidden my-4 py-2 px-4 font-medium bg-lavender rounded-md hover:bg-lightpurple hover:text-lavender">Menu</button>
    <ul id="mobile" class="hidden lg:flex flex-col lg:flex-row gap-10 lg:ml-32 items-center justify-center lg:justify-start grow text-xl exo-900 text-purple tracking-wider">
        <li class="hover:underline decoration-2 cursor-pointer"><a href="/products.php">Wszystkie produkty</a></li>
        <li class="hover:underline decoration-2 cursor-pointer"><a href="/cart.php">Koszyk</a></li>
    </ul>
</nav>
<hr class="border border-solid border-purple">
<div class="mt-20 lg:mx-48 mb-20 lg:mb-0">
