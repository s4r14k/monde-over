
function submitVideo () {
  
    var formData = new FormData();

    formData.append('anna', $('#anna')[0].files[0]);
    formData.append('allen', $('#allen')[0].files[0]);
    formData.append('michel', $('#michel')[0].files[0]);
    formData.append('sylvie', $('#sylvie')[0].files[0]);
    formData.append('seheno', $('#seheno')[0].files[0]);
    formData.append('mahefa', $('#mahefa')[0].files[0]);
    formData.append('patricia', $('#patricia')[0].files[0]);

    $.ajax({
           url : '/video/video.php',
           type : 'POST',
           data : formData,
           processData: false,  // tell jQuery not to process the data
           contentType: false,  // tell jQuery not to set contentType
           success : function(data) {
               alert(data + ' video ajouter');
           }
    });

    return false;
}