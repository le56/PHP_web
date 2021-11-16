<script>
 
   // function upload file 
    function upload(file,data_id,idField,type) {
            const data = new FormData();
            data.append('file', file);
            data.append("filenamedel",$(`input[name="${data_id}"]`).val())
            data.append(idField,  $(`input[name="${idField}"]`).val());
            data.append('imagestt', data_id);
            data.append('type',type)
            data.append("getOriginalName",Date.now() + file.name)
            $.ajax({
            url:"{{ route('update_image') }}",
            method:'POST',
            data:data,
            contentType:false,
            cache:false,
            processData:false,
            success: function(data){
                read(file,data_id)
                if($(`input[name="${data_id}"]`))
                 $(`input[name="${data_id}"]`).val(data)
                 if(get_images_name_product) {
                    get_images_name_product[parseInt(data_id.split("image")[1])] = data;
                 }
            }
            });
        }
       // function read image 
       function read(file,imageElementID) {
            let imageType = /image.*/
            if(file.type.match(imageType)) {
                let reader = new FileReader();
                reader.onload =  (e) => {
                    let image = new Image();
                    image.src =  e.target.result
                    $(`#${imageElementID}`).attr('src',image.src)
                }
            reader.readAsDataURL(file)
            }
            else return alert('File is not support !')
        }
</script>