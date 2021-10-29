window.addEventListener("scroll", ()=>{
    let header = document.querySelector(".heading_page__navhead");
    header.classList.toggle("sticky", scrollY > 0);
})
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
function OnlyNum(e){
    e.value = e.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
}
// document.querySelector(".test").onclick = () => {
//     alert("VV"); 
// }
$(document).ready(function(){
    $('#findbooks').keyup(function(){
        let query = $(this).val().trim();
        console.log(query);
        if(query != ""){
            $.ajax({
                url:"Function/search.php",
                method:"POST",
                data:{query:query},
                success:function(data){
                    $('#result').fadeIn();
                    $('#result').html(data);
                }
            })
        }
        else{
            $('#result').fadeOut();
            $('#result').html("");
        }
    })
    $(document).on('click', 'li', function(){
        let res = $(this).text().trim();
        $('#findbooks').val(res);
        $('#result').fadeOut();
    })
})
