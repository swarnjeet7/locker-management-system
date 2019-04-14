$(document).ready(function() {

    $("#login").click(function() {
        // debugger
        const userId = $("#inputId").val();
        const pwd = $("#inputPassword").val();
    
        if(!userId) {
            return alert("Please enter User Id");
        }
        if(!pwd) {
            return alert("Please enter your password");
        }

        $.ajax({
            method: "POST",
            url: '/api/login',
            data: JSON.stringify({accId: userId, password: pwd}),
            success: function(response) {
                const res = JSON.parse(response);
                if(res.status == 'success') {
                    window.location.href = '/customers/'+userId;
                    return;
                }
                if(res.status == 'error') {
                    return alert(res.message);
                }
            },
            eorror: function(response) {
                console.log(response)
            } 
        })
    });

    $("#applyLocker").click(function() {
        
    });


    
});