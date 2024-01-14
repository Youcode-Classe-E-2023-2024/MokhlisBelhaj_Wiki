<?php require APPROOT . '\views\include\sidebar.php'; 
 $article=$data['article'];
?>


<!-- main content -->
<section id="content" class="w-[100wh-60px] lg:w-[100wh-250px] ml-[60px] lg:ml-[240px] p-5 right-0 transition-all duration-500 ease-in-out">


    <!-- component -->
    <div class="mt-6 bg-gray-50">
        <div class=" px-10 py-6 mx-auto">

            <!--author-->
            <div class="max-w-6xl px-10 py-6 mx-auto bg-gray-50">

                <a href="#_" class="block transition duration-200 ease-out transform hover:scale-110">
                    <img class="object-cover w-full shadow-sm h-full" src="http://localhost/MokhlisBelhaj_Wiki/img/<?= $article->imageName ?>">
                </a>

                <!--post tags-->
                <div class="flex items-center justify-start mt-4 mb-4">
                    <?php foreach($data['tag'] as $item): ?>
                    <a href="#" class="px-2 py-1 font-bold bg-red-400 text-white rounded-lg hover:bg-gray-500 mr-4"><?= $item ?></a>
                    <?php endforeach; ?>
                </div>
                <div class="mt-2">
                    <!--post heading-->
                    <p class="sm:text-3xl md:text-3xl lg:text-3xl xl:text-4xl font-bold text-purple-500  hover:underline"><?= $article->title;  ?></p>

                    
                    

                    <!--author avator-->
                    <div class="font-light text-gray-600">

                            <h1 class="font-bold text-gray-700 hover:underline">By <?=$article->user_name;  ?> </h1>
                    </div>
                </div>

                <!--end post header-->
                <!--post content-->
                <div class="max-w-4xl px-10  mx-auto text-2xl text-gray-700 mt-4 rounded bg-gray-100">

                    <!--content body-->
                    <div>
                        <p class="mt-2 p-8"><?=$article->content;  ?> </p>
                    </div>



                </div>
            </div>

            <!--related posts-->
            <!-- <h2 class="text-2xl mt-4 text-gray-500 font-bold text-center">Related Posts</h2>
            <div class="flex grid h-full grid-cols-12 gap-10 pb-10 mt-8 sm:mt-16">


                <div class="grid grid-cols-12 col-span-12 gap-7">
                    <div class="flex flex-col items-start col-span-12 overflow-hidden shadow-sm rounded-xl md:col-span-6 lg:col-span-4">
                        <a href="#_" class="block transition duration-200 ease-out transform hover:scale-110">
                            <img class="object-cover w-full shadow-sm h-full" src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80">
                        </a>
                        <div class="relative flex flex-col items-start px-6 bg-white border border-t-0 border-gray-200 py-7 rounded-b-2xl">
                            <div class="bg-indigo-400 absolute top-0 -mt-3 flex items-center px-3 py-1.5 leading-none w-auto inline-block rounded-full text-xs font-medium uppercase text-white inline-block">
                                <span>Flask</span>
                            </div>
                            <h2 class="text-base text-gray-500 font-bold sm:text-lg md:text-xl"><a href="#_">Oauth using facebook with flask,mysql,vuejs and tailwind css</a></h2> -->
                            <!-- <p class="mt-2 text-sm text-gray-500">Learn how to authenticate users to your application using facebook.</p> -->
                        <!-- </div>
                    </div>

                    <div class="flex flex-col items-start col-span-12 overflow-hidden shadow-sm rounded-xl md:col-span-6 lg:col-span-4">
                        <a href="#_" class="block transition duration-200 ease-out transform hover:scale-110">
                            <img class="object-cover w-full shadow-sm h-full" src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80">
                        </a>
                        <div class="relative flex flex-col items-start px-6 bg-white border border-t-0 border-gray-200 py-7 rounded-b-2xl">
                            <div class="bg-red-400 absolute top-0 -mt-3 flex items-center px-3 py-1.5 leading-none w-auto inline-block rounded-full text-xs font-medium uppercase text-white inline-block">
                                <span>Django</span>
                            </div>
                            <h2 class="text-base text-gray-500 font-bold sm:text-lg md:text-xl"><a href="#_">Authenticating users with email verification in Django apps</a></h2> -->
                            <!-- <p class="mt-2 text-sm text-gray-500">Learn how to authenticate users to your web application by sending secure links to their email box.</p> -->
                        <!-- </div>
                    </div>

                    <div class="flex flex-col items-start col-span-12 overflow-hidden shadow-sm rounded-xl md:col-span-6 lg:col-span-4">
                        <a href="#_" class="block transition duration-200 ease-out transform hover:scale-110">
                            <img class="object-cover w-full shadow-sm h-full" src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80">
                        </a>
                        <div class="relative flex flex-col items-start px-6 bg-white border border-t-0 border-gray-200 py-7 rounded-b-2xl">
                            <div class="bg-purple-500 absolute top-0 -mt-3 flex items-center px-3 py-1.5 leading-none w-auto inline-block rounded-full text-xs font-medium uppercase text-white inline-block">
                                <span>Flask</span>
                            </div>
                            <h2 class="text-base text-gray-500 font-bold sm:text-lg md:text-xl"><a href="#_">Creating user registration and authentication system in flask</a></h2> -->
                            <!-- <p class="mt-2 text-sm text-gray-500">Learn how to authenticate users to your application using flask and mysql db.</p> -->
                        <!-- </div>
                    </div>
                </div> -->

            </div>


        


         

         
        </div>
    </div>
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