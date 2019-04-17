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
                console.log(res)
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

    $("#adminLogin").click(function() {
        // debugger
        const username = $("#inputId").val();
        const password = $("#inputPassword").val();
    
        if(!username) {
            return alert("Please enter User Id");
        }
        if(!password) {
            return alert("Please enter your password");
        }

        $.ajax({
            method: "POST",
            url: '/api/admin/login',
            data: JSON.stringify({username: username, password: password}),
            success: function(response) {
                console.log(response)
                // debugger;
                const res = JSON.parse(response);
                if(res.status == 'success') {
                    window.location.href = '/admin/dashboard';
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
        const startDate = $("#startDate").val();
        const duration = $("#duration").val();
        const jointHolders = $("#jointWith").val();
    
        if(!startDate) {
            return alert("Please select date from tomorrow onwards");
        }
        if(!duration) {
            return alert("Please Choose time of duration");
        }

        $.ajax({
            method: "POST",
            url: '/api/apply_locker',
            data: JSON.stringify({startDate: startDate, duration: duration, jointHolders: jointHolders}),
            success: function(response) {
                console.log(response)
                if(response) {
                    window.location.href = '/'
                }
            },
            eorror: function(response) {
                console.log(response)
            } 
        })
    });

    $('.locker_menu').change(function() {
        $('.locker_menu').not(this).prop('selectedIndex',0);
        $('.btn.btn-primary').addClass('disabled');
        var btnId = $(this).attr('data-btn');
        if($(this).val() > 0) {
            $('#'+btnId).removeClass('disabled');
        } else {
            $('.btn.btn-primary').addClass('disabled');
        }
    });

    $('.assignLocker').click(function(event) {
        event.stopImmediatePropagation();
        event.preventDefault();

        var btnId = $(this).attr('id');
        var accountId = btnId.split('_')[1];
        var lockerId = $('select[data-btn="'+btnId+'"]').val();
        var startDate = $('select[data-btn="'+btnId+'"]').attr('data-date');
        console.log(startDate);
        if(!accountId) {
            return alert("There is something wrong, Please check after some time");
        }
        if(!lockerId) {
            return alert("Please Select locker id");
        }
        $.ajax({
            method: "POST",
            url: '/api/assign_locker',
            data: JSON.stringify({accountId: accountId, lockerId: lockerId}),
            success: function(response) {
                console.log(response)
                // if(response) {
                //     window.location.href = '/'
                // }
            },
            eorror: function(response) {
                console.log(response)
            } 
        })
    });


    if(document.getElementById("startDate")) {
        var input = document.getElementById("startDate");
        var today = new Date();
        var day = today.getDate();
        // Set month to string to add leading 0
        var mon = new String(today.getMonth()+1); //January is 0!
        var yr = today.getFullYear();

        if(mon.length < 2) { mon = "0" + mon; }

        var date = new String( yr + '-' + mon + '-' + day );

        input.disabled = false; 
        input.setAttribute('min', date);
    }
});