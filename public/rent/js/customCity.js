let country = $("#destination_parent"),
    city = $("#destination_select"),
    state = $("#destination_id"),
    semt = $("#semt_select")

country.on("change", function(){
    let select = $(this).val(), url = '/villa/parent/' + select,id = city.attr('data-id'),html='<option>Seçiniz</option>'
    city.attr("disabled", false);
    $.getJSON(url, function(result){
        $.each(result, function(index, value){
            if (value.id==id){
                html +='<option value="'+value.id+'" selected>'+value.title+'</option>';
            }else{
                html +='<option value="'+value.id+'">'+value.title+'</option>';
            }
        })
        $("#destination_select").html(html);
    })
})

city.on("change", function(){
    let url = '', select = $(this).val(),id = $(this).attr('data-id'),html='<option>Seçiniz</option>'
    state.attr("disabled", false);
    if(id>0){url = '/villa/parent/' + id}else{url = '/villa/parent/' + select}
    $.getJSON(url, function(result){
        console.log(result)
        $.each(result, function(index, value){
            if (value.id==state.attr('data-id')){
                html +='<option value="'+value.id+'" selected>'+value.title+'</option>';
            }else{
                html +='<option value="'+value.id+'">'+value.title+'</option>';
            }
        })
        $("#destination_id").html(html);
    })
})

state.on("change", function(){
    let select = $(this).val(),id = $(this).attr('data-id'),html='<option>Seçiniz</option>'
    semt.attr("disabled", false);
    if(id>0){url = '/select/state/' + id}else{url = '/select/state/' + select}

    $.getJSON(url, function(result){
        $.each(result, function(index, value){
            if (value.id==semt.attr('data-id')){
                html +='<option value="'+value.id+'" selected>'+value.name+'</option>';
            }else{
                html +='<option value="'+value.id+'">'+value.name+'</option>';
            }
        });
        $("#semt_select").html(html);
    });
});

let country1 = $("#destination_parent1"),
    city1 = $("#destination_select1"),
    state1 = $("#destination_id1"),
    semt1 = $("#semt_select1")

country1.on("change", function(){
    let select = $(this).val(), url = '/select/county/' + select,id = city1.attr('data-id'),html='<option>Seçiniz</option>'
    city1.attr("disabled", false);
    $.getJSON(url, function(result){
        $.each(result, function(index, value){
            if (value.id==id){
                html +='<option value="'+value.id+'" selected>'+value.name+'</option>';
            }else{
                html +='<option value="'+value.id+'">'+value.name+'</option>';
            }
        })
        $("#destination_select1").html(html);
    })
})

city1.on("change", function(){
    let select = $(this).val(),id = $(this).attr('data-id'),html='<option>Seçiniz</option>'
    state1.attr("disabled", false);
    if(id>0){url = '/select/city/' + id}else{url = '/select/city/' + select}

    $.getJSON(url, function(result){
        $.each(result, function(index, value){
            if (value.id==state1.attr('data-id')){
                html +='<option value="'+value.id+'" selected>'+value.name+'</option>';
            }else{
                html +='<option value="'+value.id+'">'+value.name+'</option>';
            }
        })
        $("#destination_id1").html(html);
    })
})