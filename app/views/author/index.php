<?php require APPROOT . '\views\include\sidebar.php'; ?>


<!-- main content -->
<section id="content" class="w-[100wh-60px] lg:w-[100wh-250px] ml-[60px] lg:ml-[240px] p-5 right-0 transition-all duration-500 ease-in-out">
    <!-- user summary -->

    <div class="grid grid-cols-1 p-4 bg-gray-50 overflow-x-auto gab-3 border border-gray-100 rounded-lg mb-2">
        <div class="flex justify-between p-3">
            <span class="text-2xl font-bold uppercase">wiki</span>

            <button id="addNewWiki" class="flex items-center bg-gradient-to-r from-violet-300 to-indigo-300 hover:from-violet-900 hover:to-indigo-900  border border-fuchsia-00 hover:border-violet-100 text-white font-semibold py-2 px-4 rounded-md transition-colors duration-300">
                <svg class="w-4 h-4 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <p class="text-white">
                    add new xwiki
                </p>
            </button>
        </div>
        <table class="w-full text-center">
            <thead class="bg-gray-100 rounded-sm">
                <tr>
                    <th class="text-center">title</th>
                    <th class="text-center">content</th>
                    <th class="text-center">author</th>
                    <th class="text-center">category</th>
                    <th class="text-center">tags</th>
                    <th class="text-center">create_at</th>
                    <th class="text-center">edit_at</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            <tbody class=" bg-white ">
                <tr>
                    <td>Rabiul Islam</td>
                    <td>rir.cse.71@gmail.com</td>
                    <td>cse</td>
                    <td>author</td>
                    <td>cse</td>
                    <td>2023-11-29 15:28:45</td>
                    <td>2023-11-29 15:28:45</td>
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

    </br>
</section>
</main>






<footer class="bg-black p-5 bottom-0 fixed w-full">
    <p class="text-center text-white">Copyright @2024</p>
</footer>


<script src="<?= URLROOT; ?>js\main.js"> </script>

</body>

</html>