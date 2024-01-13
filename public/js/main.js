function collapseSidebar() {
    let sidebar = document.getElementById('sidebar')
    let content = document.getElementById('content')
    let toggle = document.getElementById('toggle-button')
    let titles = sidebar.querySelectorAll('span')

    if (sidebar.classList.contains('lg:w-[240px]')) {
        //sidebar
        sidebar.classList.remove('lg:w-[240px]')
        sidebar.classList.add('w-[60px]')

        //content
        content.classList.remove('lg:w-[100wh-250px]')
        content.classList.remove('lg:ml-[240px]')
        content.classList.add('lg:w-[100wh-100px]')
        content.classList.add('ml-[60px]')

        //toggle
        toggle.classList.remove('rotate-0')
        toggle.classList.add('rotate-180')
    } else {
        //sidebar
        sidebar.classList.remove('w-[60px]')
        sidebar.classList.add('lg:w-[240px]')

        //content
        content.classList.remove('lg:w-[100wh-100px]')
        content.classList.remove('ml-[60px]')
        content.classList.add('lg:w-[100wh-250px]')
        content.classList.add('lg:ml-[240px]')

        //toggle
        toggle.classList.remove('rotate-180')
        toggle.classList.add('rotate-0')
    }
}