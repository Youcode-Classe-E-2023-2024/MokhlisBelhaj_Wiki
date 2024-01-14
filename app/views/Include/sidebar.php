<?php require APPROOT . '\views\include\header.php'; ?>


<body class="h-screen">

    <header class="h-14 bg-gray-100 top-0 w-full fixed shadow" style="z-index: 99999;">
        <div class="flex bg-blue-200 justify-between items-center px-10 h-14">
            <div class="flex justify-between items-center gap-x-14">
                <?php if (isset($_SESSION['name'])) : ?>
                    <div class="w-40">
                        <h2 class="text-md font-bold" href="#"> <?php echo $_SESSION['name'] ?>
                        </h2>
                        <p class="text-black uppercase text-center text-[12px]">
                            <?php echo $_SESSION['role'] ?>
                        </p>
                    </div>
                <?php endif; ?>


                <a id="toggle-button" class="hidden lg:block bg-gray-200 rounded-full transition-all duration-500 ease-in-out" onclick="collapseSidebar()" href="#"><i class="fa-solid fa-arrow-left p-3"></i></a>
            </div>


        </div>
    </header>

    <!-- main content -->
    <main class="h-[calc(100vh-120px)] w-full absolute top-14">
        <!-- left sidebar -->
        <aside id="sidebar" class=" bg-blue-300 w-[60px] lg:w-[240px] h-[calc(100vh-120px)] whitespace-nowrap fixed shadow overflow-x-hidden transition-all duration-500 ease-in-out">
            <div class="flex flex-col justify-between h-full">
                <ul class="flex flex-col gap-1 mt-2">
                    <li class="text-black hover:bg-gray-100 hover:text-gray-900">
                        <a class="w-full flex items-center py-3" href="<?php echo URLROOT; ?>/">
                            <i class="fa-solid fa-house text-center px-5"></i>
                            <span class="whitespace-nowrap pl-1">HOME</span>
                        </a>
                    </li>
                    <?php if (isset($_SESSION['role'])) : ?>
                        <li class="text-black hover:bg-gray-100 hover:text-gray-900">
                            <?php if ($_SESSION['role'] == 'admin') : ?>
                                <a class="w-full flex items-center py-3" href="<?php echo URLROOT; ?>admin/index">
                                <?php else : ?>
                                    <a class="w-full flex items-center py-3" href="<?php echo URLROOT; ?>author">
                                    <?php endif; ?>

                                    <i class="fa-solid fa-chart-line text-center px-5"></i>
                                    <span class="whitespace-nowrap pl-1">Dashboard</span>
                                    </a>
                        </li>
                    <?php endif; ?>


                </ul>
                <ul class="flex flex-col gap-1 mt-2">
                    <?php if (isset($_SESSION['name'])) : ?>
                        <li class="text-black hover:bg-red-600">
                            <a class="w-full flex items-center py-3" href="http://localhost/MokhlisBelhaj_Wiki/Authentication/logout">
                                <i class="fa-solid fa-right-from-bracket text-center px-5"></i>
                                <span class="pl-1 text-black uppercase">Logout</span>
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="text-black hover:bg-blue-500">
                            <a class="w-full flex items-center py-3" href="http://localhost/MokhlisBelhaj_Wiki/authentication/login">
                                <i class="fa-solid fa-unlock text-center px-6"></i>
                                <span class="pl-1 text-black uppercase">Login</span>
                            </a>
                        </li>
                        <li class="text-black hover:bg-blue-500">
                            <a class="w-full flex items-center py-3" href="http://localhost/MokhlisBelhaj_Wiki/authentication/signup">
                                <i class="fa-solid fa-user-plus text-center px-5"></i>
                                <span class="pl-1 text-black uppercase">Signup</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>

            </div>
        </aside>