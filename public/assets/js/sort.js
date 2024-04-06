let field = document.querySelector('.cards')

let li = Array.from(field.children);
console.log(li)

let select = document.getElementById('select')
let ar = []

select.onchange = sortingValue;

function sortingValue(){
    if(this.value ==='LowToHight'){
        sortEl(field, li, true);
    }
    if(this.value ==='HightToLow'){
        sortEl(field, li, false);
    }
}


function sortEl(field, li, asc){
    let dm, sortLi;
    dm = asc ? 1 : -1;
    sortLi = li.sort((a,b)=>{
        const ax = a.getAttribute('data-price');
        const bx = b.getAttribute('data-price');

        return ax > bx ? (1*dm):(-1*dm);
    })
    while(field.firstChild){
        field.removeChild(field.firstChild);
    }
    field.append(...sortLi);
}
