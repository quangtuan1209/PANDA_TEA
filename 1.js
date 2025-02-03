/*đoạn code chạy silde ảnh banner*/
var i = 1;
function trans() {
	var imgs = ["./img/bn1.jpg","./img/bn.jpg","./img/ba2.jpg","./img/ba4.png"];
	document.querySelector('.banner_slide').src = imgs[i];
	i++;
	if(i==4)
	{
		i=0;
	}
}

document.addEventListener('DOMContentLoaded', function() {
	
              document.querySelector('.banner_slide').onclick = setInterval(trans,2000);
          });
/*end*/

