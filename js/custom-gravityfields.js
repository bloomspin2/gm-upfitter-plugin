var $=jQuery;

jQuery(document).on('gform_post_render', function(){

    generateMakeHTML(true);
    generateModelHTML(true);
    generateTypeHTML(true);
    var jsonIndex = 0;

    function getCurrentYear(){

        if($('.auto_matrix_year').val()){
            return $('.auto_matrix_year').val();
        }else{
            return false;
        }
    }

    function getCurrentMake(){
        return $('.auto_matrix_make').val();
    }

    function getCurrentModel(){
        return $('.auto_matrix_model').val();
    }
    function getCurrentModelIndex(){
        return $('.auto_matrix_model').find('option:selected').attr('modelIndex');
    }

    function getCurrentJson(){
        if(getCurrentYear()>2014){
            return eval('json_'+getCurrentYear());
        }else{
            return false;
        }
    }


    $( '.auto_matrix_year').change(function() {
        generateAll();
    });

    $( '.auto_matrix_make').change(function() {
        generateModelHTML();
        generateTypeHTML();
    });


    $( '.auto_matrix_model').change(function() {
        generateTypeHTML();
    });

    function generateAll(){
        generateMakeHTML();
        generateModelHTML();
        generateTypeHTML();
    }



    function generateMakeHTML(select){

        var json = getCurrentJson();
        var html = '';
        var value = $('.auto_matrix_make').attr("dataSelected");

        if(json){
            html+='<option disabled selected value="">Select A Make</option>';
            json.forEach((option, key) => {
                if(option[0]!="MAKE"){
                    if(value==option[0] && select){
                        html+='<option selected value="'+option[0]+'">'+option[0]+'</option>';
                    }else{
                        html+='<option value="'+option[0]+'">'+option[0]+'</option>';
                    }
                }
            });

            $(".auto_matrix_make").html(html);

        }

    }

    function generateModelHTML(select){

        var json = getCurrentJson();
        var html = '';
        var value = $('.auto_matrix_model').attr("dataSelected");

        html+='<option disabled selected value="">Select A Model</option>';
        if(json){

            json.forEach((element) => {

                if(element[0] == getCurrentMake()){
                    var splitModel = element[1].split('\n');
                    splitModel.forEach((option,key) => {
                        if(option!="MODEL"){

                            if(value == option && select){
                                html+='<option selected modelIndex="'+key+'" value="'+option+'">'+option+'</option>';
                            }else{
                                html+='<option modelIndex="'+key+'" value="'+option+'">'+option+'</option>';
                            }

                        }
                    });

                }

            });

            $(".auto_matrix_model").html(html);

        }

    }

    function generateTypeHTML(select){

        var json = getCurrentJson();
        var html = '';
        var value = $('.auto_matrix_type').attr("dataSelected");

        if(json){
            html+='<option disabled selected value="">Select A Type</option>';
            json.forEach((element) => {

                if(element[0] == getCurrentMake()){

                    var splitModelType = element[2].split('\n');

                    splitModelType.forEach((type,index) => {

                        if(index == getCurrentModelIndex()){
                            var splitType = type.split(',');
                            splitType.forEach((type) => {
                                if(type!="TYPE"){

                                    if(value == type && select){
                                        html+='<option selected value="'+type+'">'+type+'</option>';
                                    }else{
                                        html+='<option value="'+type+'">'+type+'</option>';
                                    }

                                }
                            });
                        }

                    });

                }

            });

            $(".auto_matrix_type").html(html);

        }

    }

});
