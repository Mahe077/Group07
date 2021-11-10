let trash_alt = document.querySelectorAll(".fa-trash-alt");
for (let i = 0; i < trash_alt.length; i++) {
    trash_alt[i].addEventListener('click',()=>{
       // console.log(i);
       trash_alt[i].parentElement.parentElement.parentElement.style.display = 'none';
    })
}
console.log(trash_alt);
