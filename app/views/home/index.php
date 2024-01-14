<?php require APPROOT . '\views\include\sidebar.php'; ?>


<!-- main content -->
<section id="content" class="w-[100wh-60px] lg:w-[100wh-250px] ml-[60px] lg:ml-[240px] p-5 right-0 transition-all duration-500 ease-in-out">


    <div id="homecategory" class="  grid my-3  grid-cols-1 md:grid-cols-3 gap-6 p-3 overflow-x-auto  w-full rounded-lg bg-blue-300">
    </div>
    <div class=" flex justify-center  my-3  p-3 overflow-x-auto   w-full rounded-lg bg-blue-100">


        <label class="text-center bg-black text-white p-3 rounded-l-lg" for="search">search</label>
        <input type="search" class="w-80" id="search">
        <select id="searchType" name="search" class=" text-center bg-black text-white p-3 rounded-r-lg" id="">
            <option value="article">article</option>
            <option value="Tags">tag</option>
            <option value="category">category</option>

        </select>

    </div>
    <div class=" h-4/3 flex justify-center  w-full   my-3   rounded-lg bg-gray-100 ">
        <div id="articleHOME" class="grid my-3  grid-cols-1   w-full">


        </div>
    </div>







    </br>
</section>
</main>

<script>
    // ____________________getarticles________________
    function fetchAndRenderArticles() {
        $.ajax({
            url: 'http://localhost/MokhlisBelhaj_Wiki/home/allarticles',
            method: 'post',
            success: function(response) {
                data = JSON.parse(response);

                $('#articleHOME').empty();
                $.each(data, function(index, item) {
                    renderArticle(item);
                });
            },
            error: function(error) {
                console.log('Error fetching articles: ', error);
            }
        });
    }

function noArticle(item){
    $("#articleHOME").empty();
    var html =`<div class="w-full flex justify-center"><p class="text-2xl font-bold">${item.message}</p></div>`
    $("#articleHOME").append(html);


}
    function renderArticle(item) {
        var html = `<div class="w-full flex justify-center">
    <a href="http://localhost/MokhlisBelhaj_Wiki/Home/pagedetail/${item.id}" class="my-3 flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-3/5 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="http://localhost/MokhlisBelhaj_Wiki/img/${item.imageName}" alt="">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${item.title}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${item.content}</p>
        </div>
    </a>
</div>`;
        $("#articleHOME").append(html);
    }
    $(document).ready(function() {
        var search = $('#search')

        search.on('keyup', function() {
            var searchType = $('#searchType').val();

            // Get the search input value
            

            if (search.val() == '') {
                fetchAndRenderArticles();

               

            } else {
                $("#articleHOME").empty();
                console.log(searchType); 
                searchArticle()
                

            }
        });
        fetchAndRenderArticles();


        $.ajax({
            url: 'http://localhost/MokhlisBelhaj_Wiki/home/lastcategorys',
            method: 'post',
            success: function(response) {
                data = JSON.parse(response);
                console.log(data);

                $('#homecategory').empty();
                $.each(data, function(index, item) {
                    html = `<div class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
            <div class="text-left rtl:text-right">
                <div class=" font-sans text-sm font-semibold">${item.name}</div>
            </div>
        </div>`
                    $("#homecategory").append(html)
                })
            },
            error: function(error) {
                console.log('Error deleting post: ', error);


            }

        });
    });
    // _________________________searcharticles________________________
    function searchArticle(){
        var type = $('#searchType').val();
        var value = $('#search').val();
        console.log('Searching');
        $.ajax({
            url: 'http://localhost/MokhlisBelhaj_Wiki/home/searcharticles',
            method: 'post',
            data:{ 
                type:type,
                value:value

            },
            success: function(response) {
                data = JSON.parse(response);
                console.log(data);

                $('#articleHOME').empty();
                $.each(data, function(index, item) {
                    renderArticle(item);
                });
            },
            error: function(error) {
                data=error.responseJSON;
                console.log(data);
                noArticle(data);

                
            }
        });
              
               

            }
</script>






<footer class="bg-black p-5 bottom-0 fixed w-full">
    <p class="text-center text-white">Copyright @2024</p>
</footer>


<script src="<?= URLROOT; ?>js\main.js"> </script>

</body>

</html>