(function() {
  var approvalAjax={
    init:function() {
      this.catchDom();
      this.bindEvent();
      this.render()
    },

    render:function() {
      console.log('yess');
      $.ajax({
          method:"GET",
          url:"/dashboard/application/"+approvalAjax.$id.val(),
          data:{},
          success:function (res) {
            var status=res.status;
            $(".app-status").fadeIn().html(res.status)
            if (status=="Rejected") {
              console.log("rejected",status);
              $(".rejected-s").fadeIn();
            }
            if(status=='PayGo') {
              approvalAjax.$paygo.removeClass("loading")
              $(".paygo").fadeIn();
              $(".meet-up").fadeIn();
              $(".app-fee").fadeIn();
            }
            if (status=="Received") {
              $(".meet-up").fadeIn();
              $(".app-fee").fadeIn();
            }
            if (status=="MeetUp") {
              $(".meet-up").fadeIn();
              $(".app-fee").fadeIn();
            }
          }

        })
    },
    flash:function(type,msg) {
      if (type=="success") {
        this.$msg.fadeIn().html(`<div class='ui message green'>${msg}</div>`)
      }else {
        this.$msg.fadeIn().html(`<div class='ui message red'>${msg}</div>`)
      }
    },
    catchDom:function() {
      this.$el=$(".app-details-containder");
      this.$elF=$("form");
      this.$paygo=this.$el.find(".paygo");
      this.$reject=this.$elF.find(".reject-app-bind");
      this.$token=this.$elF.find($("input[name=_token]"));
      this.$id=this.$elF.find($("input[name=appId]"));
      this.$userId=this.$elF.find($("input[name=userId]"));
      this.$msg=this.$elF.find(".msg");
    },
    bindEvent:function() {
      this.$paygo.on("click",this.paygo)
      $(".reject-app-bind").on("click",this.reject)
      $(".receive-app-bind").on("click",this.receive)
    },
    receive:function() {
      approvalAjax.$elF.addClass("loading")
      var time=approvalAjax.$elF.find($("input[name=time]")).val()
      var date1=approvalAjax.$elF.find($("input[name=date1]")).val()
      var date2=approvalAjax.$elF.find($("input[name=date2]")).val()
      var date3=approvalAjax.$elF.find($("input[name=date3]")).val()
      var inspection=approvalAjax.$elF.find($("input[name=inspection]")).val()
      var allocation=approvalAjax.$elF.find($("input[name=allocation]")).val()
      var assessment=approvalAjax.$elF.find($("input[name=assessment]")).val()
    $.ajax({
        type:"POST",
        url:"/admin/dashboard/receive",
        cache:false,
        data:{
          "_token":approvalAjax.$token.val(),
          'time':time,
          'appId':approvalAjax.$id.val(),
          'date1':date1,
          'date2':date2,
          'date3':date3,
          'inspection':inspection,
          'assessment_fee':assessment,
          'allocation':allocation,
        },
        success:function (data) {
          approvalAjax.$elF.removeClass("loading")
          if (data.status=="received") {
            console.log('recived...');
            approvalAjax.render()
            approvalAjax.flash("error","Application has already been received");
            approvalAjax.$elF.find("input").val("");
          }
          else {
            console.log('recived...');
            approvalAjax.render()
            approvalAjax.flash("success","Application Received");
            approvalAjax.$elF.find("input").val("");
          }
        },
        error:function(error) {
          approvalAjax.$elF.removeClass("loading")
          approvalAjax.render()
          approvalAjax.flash("error","All fields are required");
        }

      })
    },
    reject:function() {
      var msg=approvalAjax.$elF.find("#reject-msg").val();
      $.ajax({
        type:"POST",
        url:'/admin/dashboard/reject',
        data:{
          "_token":approvalAjax.$token.val(),
          "appId":approvalAjax.$id.val(),
          "userId":approvalAjax.$userId.val(),
          "msg":msg
        },
        success:function(res) {
          if (res.status=="success") {
            approvalAjax.render()
            approvalAjax.flash("success","application has been rejected successfully");
            approvalAjax.$elF.find("#reject-msg").val("");
          }
        }
      })
    },
    paygo:function() {
      var appId=$(this).attr("data-id");
      var token=$(this).attr("data-token");
      approvalAjax.$paygo.addClass("loading")
      $.ajax({
        type:'POST',
        url:"/admin/dashboard/paygo",
        data:{"_token":token,"appId":appId},
        success:function(res) {
        approvalAjax.render()
        }
      })
    },

  }

  approvalAjax.init();
})()
