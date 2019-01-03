function rewardRandom(nameRewardRandom, donorRewardRandom, priceRewardRandom) {
    $.ajax({
        url: "http://moket-dev.com/admin/reward-random",
        method: "POST",
        dataType: "JSON",
        data: {
            nameRewardRandom : nameRewardRandom,
            donorRewardRandom : donorRewardRandom,
            priceRewardRandom : priceRewardRandom,
        },
        success:function(result) {
            console.log(result)
        }
     });
}
function rewardVip(nameRewardVip, donorRewardVip, priceRewardVip) {
    $.ajax({
        url: "http://moket-dev.com/admin/reward-vip",
        method: "POST",
        dataType: "JSON",
        data: {
            nameRewardVip : nameRewardVip,
            donorRewardVip : donorRewardVip,
            priceRewardVip : priceRewardVip,
        },
        success:function(result) {
            console.log(result)
        }
     });
}
$(document).ready(function() {
    $("#btn-up").click(function() {
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var nameRewardRandom = $("#nameRewardRandom").val()
        var donorRewardRandom = $("#donorRewardRandom").val()
        var priceRewardRandom = $("#priceRewardRandom").val()
        var nameRewardVip = $("#nameRewardVip").val()
        var donorRewardVip = $("#donorRewardVip").val()
        var priceRewardVip = $("#priceRewardVip").val()
        rewardRandom(nameRewardRandom, donorRewardRandom, priceRewardRandom)
        rewardVip(nameRewardVip, donorRewardVip, priceRewardVip)
    })

})