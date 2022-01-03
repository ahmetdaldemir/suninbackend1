let country = $("#country_select"),
    city = $("#city_select"),
    state = $("#state_select"),
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
        city.html(html);
    })
})

city.on("change", function(){
    let select = $(this).val(),id = $(this).attr('data-id'),html='<option>Seçiniz</option>'
    state.attr("disabled", false);
    if(select.length=='36'){
        url = '/villa/parent/' + select
    }else{
        url = '/villa/parent/' + id
    }
    $.getJSON(url, function(result){
        $.each(result, function(index, value){
            if (value.id==state.attr('data-id')){
                html +='<option value="'+value.id+'" selected>'+value.title+'</option>';
            }else{
                html +='<option value="'+value.id+'">'+value.title+'</option>';
            }
        })
        state.html(html);
    })
})

state.on("change", function(){
    let select = $(this).val(),id = $(this).attr('data-id'),html='<option>Seçiniz</option>'
    semt.attr("disabled", false);
    if(select.length=='36'){
        url = '/villa/parent/' + select
    }else{
        url = '/villa/parent/' + id
    }
    $.getJSON(url, function(result){
        $.each(result, function(index, value){
            if (value.id==semt.attr('data-id')){
                html +='<option value="'+value.id+'" selected>'+value.title+'</option>';
            }else{
                html +='<option value="'+value.id+'">'+value.title+'</option>';
            }
        });
        semt.html(html);
    });
});
