<script>
$('#my-form').submit( function(e) {
e.preventDefault();

var data = new FormData(this); // <-- 'this' is your form element

$.ajax({
        url: 'index.php/Form',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function(data){
            alert(data);
        },
        error: function(){
    alert('ERROR at PHP side!!');
}
});
});

</script>
