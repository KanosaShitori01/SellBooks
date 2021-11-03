window.addEventListener("scroll", ()=>{
    let header = document.querySelector(".heading_page__navhead");
    header.classList.toggle("sticky", scrollY > 0);
})
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
function OnlyNum(e, max){
    e.value = e.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
    // let str = e.value.length;
    // if(str > max){
    //     e.value = "";
    // }
}
let money = document.querySelectorAll(".money .price");
// console.log(money);
function moneyForm(valmoney){
    let count = 0;
    console.log(valmoney[0].innerHTML);
    // valmoney.forEach((val,index)=>{
    //     console.log(val);
    // });
    // let valtoArr = valmoney.split("");
    // let valArrRer = valtoArr.reverse();
    // for(let i = 0; i < valArrRer.length; i++){
    //     if(valArrRer[i] == "0"){
    //         count++;
    //     }
    //     if(count == 3){
    //         valArrRer[i+1] += ",";
    //         count = 1;  
    //     }
    // }
    // let reVal = valArrRer.reverse();
    // let beStr = reVal.join("");
    // money.innerHTML = beStr;
}
moneyForm(money);
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

    $('.prev').on("click",function(){
        let prev = $(this).closest('.snipper').find('input').val();
        if(prev == 1){
            $(this).closest('.snipper').find('input').val('1');
        }else{
            let prevVal = prev - 1;
            $(this).closest('.snipper').find('input').val(prevVal);
        }
    })
    $('.next').on("click",function(){
        let next = $(this).closest('.snipper').find('input').val();
            let nextVal = ++next;
            $(this).closest('.snipper').find('input').val(nextVal);
    })
})

