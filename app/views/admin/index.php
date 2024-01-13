<?php require APPROOT . '\views\include\header.php'; ?>


<body class="h-screen">

    <header class="h-14 bg-gray-100 top-0 w-full fixed shadow" style="z-index: 99999;">
        <div class="flex justify-between items-center px-10 h-14">
            <div class="flex justify-between items-center gap-x-14">
                <div class="w-40">
                    <h2 class="text-md font-bold" href="#"> <?php echo $_SESSION['name'] ?>
                    </h2>
                    <p class="text-gray-400 text-[12px]">
                        <?php echo $_SESSION['role'] ?>
                    </p>
                </div>

                <a id="toggle-button" class="hidden lg:block bg-gray-200 rounded-full transition-all duration-500 ease-in-out" onclick="collapseSidebar()" href="#"><i class="fa-solid fa-arrow-left p-3"></i></a>
            </div>


        </div>
    </header>

    <!-- main content -->
    <main class="h-[calc(100vh-120px)] w-full absolute top-14">
        <!-- left sidebar -->
        <aside id="sidebar" class="w-[60px] lg:w-[240px] h-[calc(100vh-120px)] whitespace-nowrap fixed shadow overflow-x-hidden transition-all duration-500 ease-in-out">
            <div class="flex flex-col justify-between h-full">
                <ul class="flex flex-col gap-1 mt-2">
                    <li class="text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                        <a class="w-full flex items-center py-3" href="<?php echo URLROOT; ?>/">
                            <i class="fa-solid fa-house text-center px-5"></i>
                            <span class="whitespace-nowrap pl-1">HOME</span>
                        </a>
                    </li>

                    <li class="text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                        <a class="w-full flex items-center py-3" href="#">
                            <i class="fa-solid fa-chart-line text-center px-5"></i>
                            <span class="whitespace-nowrap pl-1">Dashboard</span>
                        </a>
                    </li>


                </ul>

                <ul class="flex flex-col gap-1 mt-2">
                    <li class="text-gray-500 hover:bg-red-400 hover:text-gray-900">
                        <a class="w-full flex items-center py-3" href="http://localhost/MokhlisBelhaj_Wiki/Authentication/logout">
                            <i class="fa-solid fa-right-from-bracket text-center px-5"></i>
                            <span class="pl-1">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- main content -->
        <section id="content" class="w-[100wh-60px] lg:w-[100wh-250px] ml-[60px] lg:ml-[240px] p-5 right-0 transition-all duration-500 ease-in-out">
            <!-- user summary -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
                <div class="bg-slate-50 p-5 m-2 rounded-md flex justify-between items-center shadow">
                    <div>
                        <h3 class="font-bold">Total Users</h3>
                        <p class="text-gray-500">100</p>
                    </div>
                    <i class="fa-solid fa-users p-4 bg-gray-200 rounded-md"></i>
                </div>

                <div class="bg-slate-50 p-5 m-2 flex justify-between items-center shadow">
                    <div>
                        <h3 class="font-bold">Total Active Users</h3>
                        <p class="text-gray-500">65</p>
                    </div>
                    <i class="fa-solid fa-users p-4 bg-green-200 rounded-md"></i>
                </div>

                <div class="bg-slate-50 p-5 m-2 flex justify-between items-center shadow">
                    <div>
                        <h3 class="font-bold">Total In Active Users</h3>
                        <p class="text-gray-500">30</p>
                    </div>
                    <i class="fa-solid fa-users p-4 bg-yellow-200 rounded-md"></i>
                </div>

                <div class="bg-slate-50 p-5 m-2 flex justify-between items-center shadow">
                    <div>
                        <h3 class="font-bold">Deleted Users</h3>
                        <p class="text-gray-500">5</p>
                    </div>
                    <i class="fa-solid fa-users p-4 bg-red-200 rounded-md"></i>
                </div>
            </div>



            <div class="grid grid-cols-1 p-4 bg-gray-50 overflow-x-auto gab-3 border border-gray-100 rounded-lg mb-2">
                <div>
                    <span class="text-2xl font-bold uppercase">users</span>
                </div>
                <table class="w-full text-center">
                    <thead class="bg-gray-100 rounded-sm">
                        <tr>
                            <th class="text-center">title</th>
                            <th class="text-center">content</th>
                            <th class="text-center">category</th>
                            <th class="text-center">create_at</th>
                            <th class="text-center">edit_at</th>
                            <th class="text-center">author</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody class=" bg-white ">
                        <tr>
                            <td>Rabiul Islam</td>
                            <td>rir.cse.71@gmail.com</td>
                            <td>cse</td>
                            <td>2023-11-29 15:28:45</td>
                            <td>2023-11-29 15:28:45</td>
                            <td>author</td>
                            <td>
                                <span class="bg-green-50 text-green-700 px-3 py-1 ring-1 ring-green-200 text-xs rounded-md">Active</span>
                            </td>
                            <td>
                                <div class="flex justify-between gap-1">
                                    <i title="Edit" class="fa-solid fa-pencil p-1 text-green-500 rounded-full cursor-pointer"></i>
                                    <i title="View" class="fa-solid fa-eye p-1 text-violet-500 rounded-full cursor-pointer"></i>
                                    <i title="Delete" class="fa-solid fa-trash p-1 text-red-500 rounded-full cursor-pointer"></i>
                                </div>
                            </td>

                        </tr>


                    </tbody>
                </table>

            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 p-4 bg-gray-50 gab-3 border border-gray-100 rounded-lg mb-2">
                <table class="w-full text-center">
                    <thead class="bg-gray-100 rounded-sm">
                        <tr>
                            <th colspan="2" class="text-2xl text-start p-3 bg-white uppercase ">
                                category
                            </th>
                            <td colspan="2" class="  p-3 bg-white ">
                                <button id="addNewCATEGORY" class="flex items-center bg-gradient-to-r from-violet-300 to-indigo-300 hover:from-violet-900 hover:to-indigo-900  border border-fuchsia-00 hover:border-violet-100 text-white font-semibold py-2 px-4 rounded-md transition-colors duration-300">
                                    <svg class="w-4 h-4 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <p class="text-white">
                                        add new category
                                    </p>
                                </button>
                                </th>
                        </tr>
                        <tr>
                            <th class="text-center">name</th>
                            <th class="text-center">create_at</th>
                            <th class="text-center">edit_at</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody id="Categorytable" class=" bg-white">
                        <tr>
                            <td>Rabiul Islam</td>
                            <td>2023-11-29 15:28:45</td>
                            <td>2023-11-29 15:28:45</td>
                            <td>
                                <div class="flex justify-between gap-1">
                                    <i title="Edit" class="fa-solid fa-pencil p-1 text-green-500 rounded-full cursor-pointer"></i>
                                    <i title="View" class="fa-solid fa-eye p-1 text-violet-500 rounded-full cursor-pointer"></i>
                                    <i title="Delete" class="fa-solid fa-trash p-1 text-red-500 rounded-full cursor-pointer"></i>
                                </div>
                            </td>
                        </tr>


                    </tbody>
                </table>
                <table class="w-full text-center">
                    <thead class="bg-gray-100 ">
                        <tr class="  rounded-t-lg">
                            <th colspan="2" class="text-2xl text-start p-3 bg-white uppercase ">
                                tag
                            </th>
                            <td colspan="2" class="  p-3 bg-white  ">
                                <button id="addNewTag" class="flex items-center bg-gradient-to-r from-violet-300 to-indigo-300 hover:from-violet-900 hover:to-indigo-900  border border-fuchsia-00 hover:border-violet-100 text-white font-semibold py-2 px-4 rounded-md transition-colors duration-300">
                                    <svg class="w-4 h-4 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    <p class="text-white">
                                        add new tag
                                    </p>
                                </button>
                                </th>
                        </tr>
                        <tr>
                            <th class="text-center">name</th>
                            <th class="text-center">create_at</th>
                            <th class="text-center">edit_at</th>

                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody id="tagtable" class=" bg-white">



                    </tbody>
                </table>

            </div>
            </br>
        </section>
    </main>
    <div id="CategoryModal" class="hidden fixed inset-0 z-10 overflow-y-auto   backdrop-blur-lg flex items-center justify-center transition-transform duration-300">
        <div class="modal-container overflow-y-auto h-fit p-6 backdrop-blur-sm bg-white/90 w-11/12 sm:w-11/12 md:w-8/12 lg:w-6/12 rounded-md shadow-sm">
            <h2 class="text-2xl font-semibold mb-6">Create New Category</h2>
            <form action="" class="Category-form">
                <div class="flex items-center justify-center p-12">
                    <div id="newinp" class="mx-auto w-full max-w-[550px]">
                        <div class="mx-3">
                            <div class="w-full px-3">
                                <div class="mb-5">
                                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                        name
                                    </label>
                                    <input type="text" name="name" placeholder="name" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

            <div class="flex justify-end">
                <button class="bg-gradient-to-r from-violet-300 to-indigo-300 hover:from-violet-900 hover:to-indigo-900 border border-fuchsia-00 hover:border-violet-100 text-white font-semibold py-2 px-4 rounded-md mr-2" onclick="createCategory()">Create</button>
                <button class="bg-gradient-to-r from-gray-100 to-slate-200 hover:from-gray-200 hover:to-slate-300 border border-fuchsia-00 hover:border-violet-100 text-gray-800 font-semibold py-2 px-4 rounded-md transition-colors duration-300" onclick="closeModal()">Cancel</button>
            </div>
        </div>
    </div>
    </div>
    <div id="TagModal" class="hidden fixed inset-0 z-10 overflow-y-auto   backdrop-blur-lg flex items-center justify-center transition-transform duration-300">
        <div class="modal-container overflow-y-auto h-fit p-6 backdrop-blur-sm bg-white/90 w-11/12 sm:w-11/12 md:w-8/12 lg:w-6/12 rounded-md shadow-sm">
            <h2 class="text-2xl font-semibold mb-6">Create New Tag</h2>
            <form action="" id="new-tag-form">
                <div class="flex items-center justify-center p-12">
                    <div id="newinp" class="mx-auto w-full max-w-[550px]">
                        <div class="mx-3">
                            <div class="w-full px-3">
                                <div class="mb-5">
                                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                        name
                                    </label>
                                    <input type="text" name="tagname" placeholder="name" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

            <div class="flex justify-end ">
                <button class="bg-gradient-to-r from-violet-300 to-indigo-300 hover:from-violet-900 hover:to-indigo-900 border border-fuchsia-00 hover:border-violet-100 text-white font-semibold py-2 px-4 rounded-md mr-2" onclick="createtag()">Create</button>
                <button class="bg-gradient-to-r from-gray-100 to-slate-200 hover:from-gray-200 hover:to-slate-300 border border-fuchsia-00 hover:border-violet-100 text-gray-800 font-semibold py-2 px-4 rounded-md transition-colors duration-300" onclick="closetagModal()">Cancel</button>
            </div>
        </div>
    </div>
    </div>
    <div id="editTagModal" class="  float-left hidden fixed inset-0 z-10 backdrop-blur-lg flex items-center justify-center transition-transform duration-300">
        <div class="modal-container p-6 backdrop-blur-sm bg-white/90 w-11/12 sm:w-11/12 md:w-8/12 lg:w-6/12 rounded-md shadow-sm">
            <h2 class="text-2xl font-semibold mb-6">update tag</h2>
            <form action="" class="project-form">
                <div class="flex items-center justify-center p-12">
                    <div  class="mx-auto w-full max-w-[550px]">
                        <div class="mx-3">
                            <div class="w-full px-3">
                                <div class="mb-5">
                                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                        name
                                    </label>
                                    <input type="text" name="name" id="nameupdatetag" placeholder="name" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" id="editeTagrid">
            </form>


            <div class="flex justify-end">
                <button class="bg-gradient-to-r from-violet-300 to-indigo-300 hover:from-violet-900 hover:to-indigo-900 border border-fuchsia-00 hover:border-violet-100 text-white font-semibold py-2 px-4 rounded-md mr-2" onclick="editeTag()">Create</button>
                <button class="bg-gradient-to-r from-gray-100 to-slate-200 hover:from-gray-200 hover:to-slate-300 border border-fuchsia-00 hover:border-violet-100 text-gray-800 font-semibold py-2 px-4 rounded-md transition-colors duration-300" onclick="closeTagEditeModal()">Cancel</button>
            </div>
        </div>
    </div>
    <div id="editCategoryModal" class="  float-left hidden fixed inset-0 z-10 backdrop-blur-lg flex items-center justify-center transition-transform duration-300">
        <div class="modal-container p-6 backdrop-blur-sm bg-white/90 w-11/12 sm:w-11/12 md:w-8/12 lg:w-6/12 rounded-md shadow-sm">
            <h2 class="text-2xl font-semibold mb-6">update Category
            </h2>
            <form action="" class="project-form">
                <div class="flex items-center justify-center p-12">
                    <div  class="mx-auto w-full max-w-[550px]">
                        <div class="mx-3">
                            <div class="w-full px-3">
                                <div class="mb-5">
                                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                                        name
                                    </label>
                                    <input type="text" name="name" id="nameupdateCategory" placeholder="name" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" id="editeCategoryrid">
            </form>


            <div class="flex justify-end">
                <button class="bg-gradient-to-r from-violet-300 to-indigo-300 hover:from-violet-900 hover:to-indigo-900 border border-fuchsia-00 hover:border-violet-100 text-white font-semibold py-2 px-4 rounded-md mr-2" onclick="editeCategory()">Create</button>
                <button class="bg-gradient-to-r from-gray-100 to-slate-200 hover:from-gray-200 hover:to-slate-300 border border-fuchsia-00 hover:border-violet-100 text-gray-800 font-semibold py-2 px-4 rounded-md transition-colors duration-300" onclick="closeCategoryEditeModal()">Cancel</button>
            </div>
        </div>
    </div>



    <footer class="bg-black p-5 bottom-0 fixed w-full">
        <p class="text-center text-white">Copyright @2024</p>
    </footer>


    <script src="<?= URLROOT; ?>js\dashboard.js"> </script>
    <script>
    </script>
</body>

</html>