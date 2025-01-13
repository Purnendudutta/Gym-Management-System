let sideBarItems = document.querySelectorAll('.sideBarItems');
let dashboardHeading=document.querySelector('.dashboard_heading');

sideBarItems.forEach(function(item) {
    item.addEventListener('click', function() {
        
        sideBarItems.forEach(function(item) {
            item.classList.remove('active');
        });
        item.classList.add('active');
        dashboardHeading.innerHTML=item.innerHTML;
    });
});
let box=document.querySelectorAll('.box');
let itags=document.querySelectorAll('.itags');
box.forEach(function(item,index){
    item.addEventListener('click',function(){
        box.forEach(function(items){
            items.classList.remove('activeBox');

        })
        itags.forEach(function(items){
            items.classList.remove('activeBoxi');

        })
        item.classList.add('activeBox');
        itags[index].classList.add('activeBoxi');

    });
});