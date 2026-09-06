const filterButtons= document.querySelectorAll('.filter-btn');
const characterCards=document.querySelectorAll('.character-list li');

filterButtons.forEach(function(button){
    button.addEventListener('click',function(){

        const selectedClass=button.dataset.filter;

        filterButtons.forEach(function(btn){
            btn.classList.remove('active');
        });

        button.classList.add('active');

        characterCards.forEach(function (card){

            if(selectedClass=='all'||card.dataset.class===selectedClass){
                card.style.display='block';
            }
            else{
                card.style.display='none';
            }
        });
    });
});