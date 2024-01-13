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
                    add new wiki
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
                    <th class="text-center">user</th>
                    <th class="text-center">create_at</th>
                    <th class="text-center">edit_at</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            <tbody id="Articletable" class=" bg-white ">

            </tbody>
        </table>
    </div>

    </br>
</section>
</main>
<div id="ArticleModal" class="hidden fixed inset-0 z-10 overflow-y-auto   backdrop-blur-lg flex items-center justify-center transition-transform duration-300">
    <div class="modal-container overflow-y-auto h-fit p-6 backdrop-blur-sm bg-white/90 w-11/12 sm:w-11/12 md:w-8/12 lg:w-6/12 rounded-md shadow-sm">
        <h2 class="text-2xl font-semibold mb-6">Create New Article</h2>
        <form id="articleForm" action="<?= URLROOT ?>Author/addArticle" method="post" class="Article-form" enctype="multipart/form-data">
            <div class="flex items-center justify-center p-12">
                <div id="newinp" class="mx-auto w-full max-w-[550px]">
                    <div class="mx-3">
                        <div class="w-full px-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase" for="large_size">image</label>
                            <input class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg
                         cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700
                          dark:border-gray-600 dark:placeholder-gray-400" name="image" id="large_size" type="file">
                        </div>
                        <div class="mb-5">
                            <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                                title
                            </label>
                            <input type="text" name="title" placeholder="title" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <label for="content" class="mb-3 block text-base font-medium text-[#07074D]">
                                content
                            </label>
                            <input type="text" name="content" placeholder="title" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                    </div>
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <select name="category" class=" w-full p-2 text-xl bg-gray-50" id="selectcategory">

                            </select>
                        </div>
                    </div>
                    <div class="w-full px-3">
                        <div class="mb-5">
                            <div class="relative w-full px-3 my-8">
                                <label for="tagInput" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Tag Assignment
                                </label>
                                <div class="flex">
                                    <input type="text" id="tagInput" placeholder="tag" class="w-full h-14 rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                    <button type="button" onclick="toggleTagDropdown()">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" data-slot="icon" class="w-6 h-6">
                                            <path id="downArrowtag" class="downTag" stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            <path id="upArrowtag" class="downTag" hidden stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="absolute max-h-40 w-full z-10 mt-2 bg-white border border-gray-300 rounded-md shadow-lg overflow-y-auto hidden" id="tagDropdownContent">

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="flex justify-end">
        <button type='submit' class="bg-gradient-to-r from-violet-300 to-indigo-300 hover:from-violet-900 hover:to-indigo-900 border border-fuchsia-00 hover:border-violet-100 text-white font-semibold py-2 px-4 rounded-md mr-2">Create</button>
        <button type="button" class="bg-gradient-to-r from-gray-100 to-slate-200 hover:from-gray-200 hover:to-slate-300 border border-fuchsia-00 hover:border-violet-100 text-gray-800 font-semibold py-2 px-4 rounded-md transition-colors duration-300" onclick="closeArticleModal()">Cancel</button>
    </div>
        </div>
 
    </form>
</div>
</div>
</div>




<footer class="bg-black p-5 bottom-0 fixed w-full">
    <p class="text-center text-white">Copyright @2024</p>
</footer>


<script src="<?= URLROOT; ?>js\dashboard2.js"></script>
<script src="<?= URLROOT; ?>js\main.js"> </script>

</body>

</html>
<script>



</script>