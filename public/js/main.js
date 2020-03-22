let carret=document.querySelector("#admin-ic-area span:nth-child(3)"); 
let list=document.querySelectorAll('.side-list ul li');
 console.log("heyy");
 
list.forEach(e => e.addEventListener('mouseenter',function(){
	 e.childNodes[4].style.width='0.3rem';

	// console.log(e.childNodes);
}));

list.forEach(e => e.addEventListener('mouseleave',function(){
	 e.childNodes[4].style.width=0;
}));


carret.addEventListener("click",function(){

	let state= document.querySelector("#acnt-act").style.display;

	if(state=='none'){
		document.querySelector("#acnt-act").style.display='block';
	}
	else{
	   document.querySelector("#acnt-act").style.display='none';	
	}
});