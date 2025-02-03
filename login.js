document.addEventListener('DOMContentLoaded',function(){
    document.querySelector('.ok').onclick = dangnhap;
    
});
function dangnhap(){
    if((document.querySelector('#name').value =="")){
        alert("Chưa điền tài khoản !");
    }
    else if((document.querySelector('#pass').value =="")){
        alert("Chưa điền mật khẩu!");
    }
}