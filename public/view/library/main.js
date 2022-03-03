$(function () {
    let villapagesimg =$(".header-info img").attr("src");
    $(".header-info").css({
        "background":"url("+villapagesimg+") center center ",
        "background-size":"cover"
    })
    

    let headerimg1 = $(".origin-logo img").attr("src");
    $(".origin-logo").css({
        "background": "url(" + headerimg1 + ")", 
        "background-position":"center center",
        "background-size": "cover"
    })



       /* Datepicker */
       $('#examplecalendar1').calendar({
        type: 'date',
        inline: true,
        className: {
            prevIcon: "icon icon-arrow-left-122",
           nextIcon: "icon icon-arrow-right-122"
        },
        metadata: {
            date: "date",
            focusDate: "focusDate",
            startDate: "startDate",
            endDate: "endDate",
            mode: "mode"
        }
      });
      
      $('#examplecalendar2').calendar({
        type: 'date',
        inline: true,
        className: {
           prevIcon: "icon icon-arrow-left-122",nextIcon: "icon icon-arrow-right-122"
         
        },
        formatter: {
            date: function (date, settings) {
                if (!date) return '';
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();

                if (month < 9) {
                    return day + ' - 0' + month;
                } else {
                    return day + ' - ' + month;
                }
            }
        }
      });
      $('#examplecalendar3').calendar({
        type: 'date',
        inline: true,
        className: {
            prevIcon: "icon icon-arrow-left-122",
           nextIcon: "icon icon-arrow-right-122"
        },
        metadata: {
            date: "date",
            focusDate: "focusDate",
            startDate: "startDate",
            endDate: "endDate",
            mode: "mode"
        }
      });




      
})
