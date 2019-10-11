(function() {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
})
  var ajaxCall={
    init:function() {
      this.catchDom();
      this.bindEvent();
    },

    render:function() {
      this.$filterd.fadeOut()
    },
    catchDom:function() {
      this.$el=$(".filterMode");
      this.$filterd=$(".app-wrapper");
      this.$options=this.$el.find(".item");
      this.tbody=this.$filterd.find(".tbody")
      this.loader=this.$filterd.find(".load")
    },
    template:function(res) {
      this.loader.fadeIn().addClass('loading')
      this.tbody.html("");
      this.tbody.addClass("loader")
      if (res.data.length == 0) {
        this.tbody.html(` <div class="ui message info " role="alert">
           Empty entery
         </div>`)
      }else {
        for (var i = 0; i < res.data.length; i++) {
          this.tbody.append(`
          <tr class="wow slideInRight" data-wow-delay="${0.8*0.1*i}s">
          <td>${i+1}</td>
          <td>${res.data[i].name }</td>
          <td>${res.data[i].location }</td>
          <td>${res.data[i].status }</td>
          <td><div class="ui button green"><a style="color:inherit"
            href="/dashboard/application/${res.data[i].id}" ><i class="eye icon " style="color:white" ></i>View Details
          </a></div></td>
          </tr>

            `)
        }

      }
    },
    bindEvent:function() {
      this.$options.on("click",this.appfilter)
    },
    appfilter:function() {
      var target=$(this).attr("data-item");
      $.ajax({
        mathod:"GET",
        url:"/admin/dashboard/application/filter",
        data:{"status":target},
        success:function(res) {
          ajaxCall.template(res);
          ajaxCall.loader.fadeOut()
        }
      })
    }
  }

  var fileOnchangeHandler={
    init:function() {
      this.catchDom();
      this.bindEvent();
    },
    catchDom:function() {
      this.$el=$(".file-handler");
      this.$img=this.$el.find("img")
      this.$input=this.$el.find("input");
      this.$icon=this.$el.find("i");
    },
    bindEvent:function() {
      this.$input.on("change",this.handleFileChange)

  },
  handleFileChange:function(){
   if (this.files && this.files[0]) {
     var reader=new FileReader();
     reader.onload=function(e){
       fileOnchangeHandler.$img.fadeIn();
       fileOnchangeHandler.$icon.fadeOut();
       fileOnchangeHandler.$img.attr('src',e.target.result)

     }
   }
   reader.readAsDataURL(this.files[0]);
 }
}
  ajaxCall.init();
  fileOnchangeHandler.init();
})()


$(".check_stutus").click(function () {
  $('.ui.modal.status-checker-m').modal('show');
})

$(".checker").submit(function (e) {
  e.preventDefault();
  $.ajax({
    method:"POST",
    url:"/checker",
    cache:false,
    contentType:false,
    processData:false,
    data:new FormData(this),
    success:function(data) {
      if (data.success) {
        $(".msg").html(`Status Of your applcation is <div class="ui label orange">${data.status}<div>`).addClass('green').fadeIn()
      }else {
        $(".msg").text(`${data.msg}`).addClass('red').fadeIn()
      }
    },
    error:function (e) {
      console.log(e);
    }
})
})

/*----------------
    Preloader
------------------*/
$(".chat-div .action,.mobile-action").click(function () {
  var body=$(".chat-div .body");
  body[0].scrollTop=body[0].scrollHeight;
  var icon=$(this).find("i")
  var elem=$(".chat-div");
  icon.addClass("minus")
  if (icon.hasClass("angle up")) {
    elem.addClass("added");
    icon.removeClass("angle up")
    icon.addClass("minus")
  }else {
    elem.removeClass("added")
    icon.removeClass("minus")
    icon.addClass("angle up")
  }
})
var win = $(window);
win.on('load', function() {
    $('.loader-custom').fadeOut('slow');

});

$('.left').click(function () {
  $('.shape').shape('flip left');
});
$('.right').click(function () {
  $('.shape').shape('flip right');
});

$('.bApprove').click(function (e) {
  e.preventDefault()

  $(".apa").addClass('loading')

})

$('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  });

  $(".paid").submit(function (e) {
    e.preventDefault();

    let file=$("#pReceipt")[0].files;
    let message=$(".msg");
    let type=$("input[name=type]").val();
    let token=$(".paid").find($("input[name=_token]")).val();
    let appId=$("input[name=appId]").val();
    $(this).addClass("loading");
    $('.submitOffline').addClass("loading");
    if (file.length==0) {
      $('.submitOffline').removeClass("loading");
      message.text("Please choose a file to upload").addClass('red').fadeIn();
    }else{
      // formdata.append("pReceipt",file)
      // formdata.append("type",type)
      // formdata.append("_token",token)
      // formdata.append("appId",appId)
      $.ajax({
        method:"POST",
        url:"/payment/transaction",
        cache:false,
        contentType:false,
        processData:false,
        data:new FormData(this),
        success:function(data) {
          if (data.success) {
          $(".paid i").fadeIn();
          $(".paid img").fadeOut();
          $('.submitOffline').removeClass("loading");
           message.text(data.msg).addClass('green').fadeIn();
          }
        },
        error:function(err){
          $(this).removeClass("loading");
           message.text("Opps Something went wrong make sure the file is in (jpg,png,jpeg) format").addClass('red').fadeIn();

        }
      })
    }
  })

/*------------------
    wow js active
--------------------*/
new WOW().init();
/*------------
   venobox
-------------- */
var veno_box = $('.venobox');
veno_box.venobox();
/*-----------------*/

$(".dashboard-side .item.calcultor-s ").click(function () {
  $(".show-calcultor-contain").fadeIn()
  // $('.item').removeClass("active");
  // $(".show").fadeOut()
  // if ($(".bar-for-side .menu i").hasClass('added')) {
  //   $(".dashboard-side").animate({'left':'-400px'})
  //   $(".overlay").fadeOut();
  // }
  // var active=$(this).attr("data");
  // $(".show-"+active).addClass('animated bounceInUp').fadeIn();
  // $(this).addClass("active");``

})

$('.rejected-s').hover(function () {
   $('.rejected-mesaage').slideDown();

  }, function () {
   $('.rejected-mesaage').slideUp();

  }
);

$(".show-calcultor-contain .cancel").click(function () {
  $(".show-calcultor-contain").fadeOut()

})

$(".additional").click(function () {
  var html = $(".clone").html();
        $(".increment").after(html)
})

$("body").on('click',".btn-remove",function () {
     $(this).parents(".control-group").remove();
  })

/*-----------------------
    Calcultor Logic
------------------------*/

var rate={
  residential:"5",
  commercial:"12",
  filling_station:"20"
}
function calculate(length,breadth,rate,height) {
  var total_accessment=length*breadth*rate*height;
  var allocation=2*2340;
  var inspection=1000;
  var total=total_accessment+allocation+inspection;
   showAccessment(total_accessment,allocation,inspection,total)
   $('.ui.modal.calculator-show').modal('show');
   console.log(total_accessment);

}
function validateInput($field) {
  var errors=[];
  for (var i = 0; i < $field.length; i++) {
    if ($field[i].value==""){
      errors.push($field[i])
    }
  }
  console.log(errors);
  return errors
}
function showAccessment(total_accessment,allocation,inspection,total) {
  $(".inspection_cal").html("&#x20A6;"+inspection);
  $(".allocation_cal").html("&#x20A6;"+allocation);
  $(".total_accessment_cal").html("&#x20A6;"+total_accessment);
  $(".total_cal").html("&#x20A6;"+total);
}
$(".calcultor .rate").on("change",function() {
  var rate_selected=$(this).val();
  var rate_value=rate[rate_selected];
  var rate_field=$("input[name=rate]");
  rate_field.val(rate_value)
})
$(".calcultor .done").click(function (event){
  event.preventDefault();

  var length=$(".calcultor-form input[name=length]").val();
  var breadth=$(".calcultor-form input[name=breadth]").val();
  var rate=$(".calcultor-form input[name=rate]").val();
  var height=$(".calcultor-form input[name=height]").val();
  $(".calcultor-form").addClass('loading');
  if (validateInput($(".calcultor-form input[type=number]")).length>0) {
    console.log("some field are empty");
     $(".calcultor-form").removeClass('loading');
    $(".calcultor .msg").text("some field are empty").fadeIn()
    return
  }
  $(".calcultor .msg").fadeOut();
  setTimeout(function() {
    $(".calcultor-form").removeClass('loading');
    calculate(length,breadth,rate,height)
  },3000)
})


$(".bar-for-side .menu").click(function () {
  if ($(".bar-for-side .menu i").hasClass('added')) {
    $(".dashboard-side").animate({'left':'-400px'})
    $(".bar-for-side .menu i").removeClass('added')
    $(".overlay").fadeOut()
  }else{
    $(".dashboard-side").animate({'left':'0px'})
    $(".bar-for-side .menu i").addClass('added')
    $(".overlay").fadeIn()

  }
})


$(".recived-app").click(function() {
  $('.received.modal')
  .modal({
    centered: false
  })
  .modal('show')
;
})
$(".cancelmod").click(function () {
  $('.opay').modal('hide')
})
$(".paygoclient").click(function () {
  $('.small.modal').modal('show');
})

$(".approve-app").click(function() {
  $('.basic-approved.modal')
  .modal({
    centered: false
  })
  .modal('setting', 'transition',"drop")
  .modal('show')
;
})

$(".approve-yes").click(function () {
  var appId=$(this).attr('data-appId')
  $.ajax({
    type:"POST",
    url:"/admin/approve",
    cache:false,
    data:{'appId':appId},
    success:function(data) {
      if (data.success) {
        $(".msg").html(data.success+" <i class='check icon'><i>").fadeIn();
        setTimeout(function() {
          window.location.reload()
        },3000)
      }
      console.log(data);
    }
  })
})

// $(".meetup").click(function() {
//   $('.meet-up-modal.modal')
//   .modal({
//     centered: false
//   })
//   .modal('setting', 'transition',"drop")
//   .modal('show')
// ;
// })

$(".app-fee").click(function () {
  $('.ui.modal.app-fee-modal').modal('show');
})

$(".meet-up").click(function () {
  $('.ui.modal.meet-up-modal')
  .modal({
   closable  : false,
   onDeny    : function(){
     console.log("closeing...");
   },
   onApprove : function() {
     setTime();
     return false

   }
 })
  .modal('show')
})

function setTime(){
  $(".meet-up-modal").find(".meet").addClass("loading");
  let option=$(".meet-up-modal").find($("input[name=meet-up-time]:checked")).val();
  let time=$(".meet-up-modal").find($("input[name=time]")).val();
  var token=$(".meet-up-modal").find("input[name=_token]").val();
  var appId=$(".meet-up-modal").find("input[name=appId]").val();
$.ajax({
    method:"POST",
    url:"/admin/meetup",
    data:{"_token":token,'date':option,'time':time,'appId':appId},
    success:function (data) {
      if (data.status=="success") {
        $(".msg").fadeIn().html("<div class='ui success message'>MeetUp date Sent Succesfully (Some messages)</div>")
        $(".meet-up-modal").find("input").val("");
        $(".meet-up-modal").find(".meet").removeClass("loading");
      }
    },
    error:function (error) {
      if (error) {
          $(".meet-up-modal").find(".meet").removeClass("loading");
          $(".msg").fadeIn().html("<div class='ui red message'>please Choose meet Up time</div><br>")
      }
    }

  })
}

$(".reject-app").click(function() {
  $('.reject.modal')
  .modal({
    centered: false
  })
  .modal('setting', 'transition',"drop")
  .modal('show')
;
})

$(".feedbacks").click(function () {
$('.app-state').slideToggle();
var elem=$(this).find("i");
if (elem.hasClass("up")) {
  elem.removeClass("up")
  elem.addClass("down")
}else{
  elem.removeClass("down")
  elem.addClass("up")
}

})

$(document).ready(function(){
  // $.ajax({
  //   url:"/applications",
  //   methos:"GET",
  //   data:{},
  //   success:function(data) {
  //     $(".application_data").html("yess");
  //   }
  // })

  /*-----------------------
      Add Loading to form
  ------------------------*/

// $("form.main-form").on('submit',function(e) {
//   //e.preventDefault();
//   $(this).addCalss("loading")
// })


  $(".bar-menu").click(function() {

    if ($(this).hasClass('bars')) {
      $(".mobile-menu-c").removeClass("zoomOutDown")
      $(this).removeClass('bars')
      $(this).addClass('times')
      $(".mobile-menu-c").fadeIn().addClass("animated zoomInUp")
      $(".overlay").fadeIn()
    }else {
      $(this).removeClass('times')
      $(".mobile-menu-c").removeClass("zoomInUp")
      $(this).addClass('bars')
      $(".mobile-menu-c").fadeOut().addClass("animated zoomOutDown")
      $(".overlay").fadeOut()

    }
  })


  $(".submit").click(function () {
    $(this).addClass("loading")
  })


  $(".refresh").click(function () {
    window.location.reload()
  })



  //*---------------------------------------------

  //Nivo slider

  //*---------------------------------------------



  $('#nivoslider-1').nivoSlider({

      effect: 'random', // Specify sets like: 'sliceDownLeft sliceUp sliceUpLeft sliceUpDown sliceUpDownLeft fold fade random slideInRight slideInLeft boxRandom boxRain boxRainReverse boxRainGrow boxRainGrowReverse'
      slices: 15, // For slice animations
      boxCols: 8, // For box animations
      boxRows: 4, // For box animations
      animSpeed: 1000, // Slide transition speed
      pauseTime: 5000, // How long each slide will show
      startSlide: 0, // Set starting Slide (0 index)
      directionNav: true, // Next & Prev navigation
      controlNav: true, // 1,2,3... navigation
      controlNavThumbs: false, // Use thumbnails for Control Nav
      pauseOnHover: false, // Stop animation while hovering
      manualAdvance: false, // Force manual transitions
      prevText: 'Prev', // Prev directionNav text
      nextText: 'Next', // Next directionNav text
      randomStart: false, // Start on a random slide
      beforeChange: function() {}, // Triggers before a slide transition
      afterChange: function() {}, // Triggers after a slide transition
      slideshowEnd: function() {}, // Triggers after all slides have been shown
      lastSlide: function() {}, // Triggers when last slide is shown
      afterLoad: function() {} // Triggers when slider has loaded

      /*effect: 'fade',

      slices: 15,

      boxCols: 8,

      boxRows: 4,

      animSpeed: 500,

      pauseTime: 5000,

      startSlide: 0,

      directionNav: true,

      controlNavThumbs: true,

      pauseOnHover: true,

      manualAdvance: false*/

  });


    $('.dropify').dropify();

  //------->>>>>  semantic javascript commands  <<<<<------//

  $('.ui.dropdown').dropdown({
    allowAdditions: true,
    transition: "fade up"
  })
  $('.ui.checkbox').checkbox();
  $('.ui.sidebar').sidebar('toggle')
  $('.shape').shape();
  $('.ui.modal').modal();

  $(".ui.form.calculator-form").form(
    {
      fields:{
        length:{
          identifier: 'length',
          rules:[
            {
              type:'empty',
              prompt:"Please enter your length value"
            }
          ]
        },
        breadth:{
          identifier: 'breadth',
          rules:[
            {
              type:'empty',
              prompt:"Please enter your breadth value"
            }
          ]
        },
        height:{
          identifier: 'height',
          rules:[
            {
              type:'empty',
              prompt:"Please enter your height value"
            }
          ]
        },
      }
      })

$(".ui.form").form(
  {
    fields:{
      fullname:{
        identifier: 'fullname',
        rules:[
          {
            type:'empty',
            prompt:"Please enter your fullname"
          }
        ]
      },

      email: {
        identifier : 'email',
        rules: [
          {
            type   : 'email',
            prompt : 'Please enter a valid e-mail'
          }
        ]
      },
      pNumber: {
        identifier : 'pNumber',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter your phone number'
          },
          {
            type   : 'number',
            prompt : 'Please enter a valid phone number'
          }
        ]
      },
      password: {
        identifier : 'password',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a password'
          },
          {
            type   : 'length[6]',
            prompt : 'Your password must be at least 6 characters'
          }
        ]
      },
      passwordConfirm: {
        identifier : 'password-confirm',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please confirm your password'
          },
          {
            identifier : 'password-confirm',
            type       : 'match[password]',
            prompt     : 'Please verify password matches'
          }
        ]
      },
      terms:{
        identifier : 'terms',
        rules: [
          {
            type   : 'checked',
            prompt : 'You must agree to the terms and conditions'
          }
        ]
      }
    },



    inline : true,
    on     : 'blur'
})
})
