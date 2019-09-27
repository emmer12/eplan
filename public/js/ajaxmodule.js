(function() {
  var chat={
      init:function() {
        this.catchDom();
        this.bindEvent();
        this.render()
        this.getChat()
        this.chatRefresh();
      },

      render:function() {
        this.resetChat();
      },
      chatRefresh:function() {
          setInterval(function() {
            chat.getChat();
          //chat.$chatBody[0].scrollTop=chat.$chatBody[0].scrollHeight+10;
        },3000)

      },
      resetChat:function() {
        this.$chatBody[0].scrollTop=this.$chatBody[0].scrollHeight;
        this.$msg.val('');
      },
      catchDom:function() {
        this.$el=$(".chat-div");
        this.$msg=this.$el.find("input");
        this.$send=this.$el.find(".sendMsg");
        this.$chatBody=this.$el.find(".body");
        this.username=this.$send.attr("data-username")
        this.imgUrl=this.$send.attr("data-img")
        this.AppimgUrl=this.$send.attr("data-app-img")
        this.appId=this.$send.attr("data-id")
        this.token=this.$send.attr("data-token")
        this.user_id=this.$send.attr("data-user_id")
        this.audio=this.$el.find("audio")
        var x=""
      },
      bindEvent:function() {
        this.$send.on("click",this.sendMsg.bind(this))
        this.$msg.on("keyup",this.sendEnter.bind(this))
      },
      sendEnter:function(e){
        if (e.keyCode==13) {
          this.sendMsg();
        }
      },
      sendToSever:function(){
        $.ajax({
          type:"POST",
          url:"/feedback/chat",
          data:{"msg":this.$msg.val(),"appId":this.appId,"_token":this.token },
          success:function(data) {
            console.log(data);
          }
        })
      },
      empty:function () {
        console.log("empty");
        chat.$chatBody.text('');
      },
      getChat:function () {
        $.ajax({
            type:"GET",
            url:"/feedback/chat",
            data:{"appId":this.appId,"_token":this.token},
            success:function (data) {
              var x="";
              chat.$chatBody.val('');
              for (var i = 0; i < data.msg.length; i++) {
                x=x.concat(
                  `<div class="message-container ${data.msg[i].user_id == chat.user_id ? 'right' : '' }">
                    <div class="time">
                      <img src="/storage/uploads/images/${data.msg[i].user_id == chat.user_id ? chat.imgUrl : chat.AppimgUrl }" width="50px" height="50px" alt="" class="mini">
                    </div>
                    <div class="data">
                      <div class="message {{ $feedback->type=="Rejected" ? ' has-error-rejected' : ''}}">
                      ${data.msg[i].messages}
                      </div>
                      <span class='name'></span>
                    </div>
                  </div>`
                )
              }
              chat.$chatBody.html(x)

            }

       })
      },
      sendMsg:function(e) {
             if (this.$msg.val()=="") {
               var footer=this.$msg.parent();
               footer.addClass("animated shake")
               this.$msg.css({'background':'#FFF6F6','border': '1px solid #9F3A3'})
               setTimeout(function () {
                 footer.removeClass("animated shake")
               },1000)
             }
             else {
               this.audio[0].play()
               this.$chatBody.append(`
                 <div class="message-container right">
                   <div class="time">
                     <img src="/storage/uploads/images/${chat.imgUrl}" width="50px" height="50px" alt="" class="mini">
                   </div>
                   <div class="data">
                     <div class="message {{ $feedback->type=="Rejected" ? ' has-error-rejected' : ''}}">
                       ${this.$msg.val()}
                     </div>
                     <span class='name'>${this.username}</span>
                   </div>
                 </div>

                 `);
                 this.sendToSever()
                 this.render()
             }

      }
  }


  var approvalAjax={
    init:function() {
      this.catchDom();
      this.bindEvent();
      this.render();
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
              $(".paygoclient").fadeIn();
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
      approvalAjax.$elF.addClass("loading")
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
            approvalAjax.$elF.removeClass("loading")
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
      var pay=confirm("Are you sure you want to allow payment")
      if(pay) {
        $.ajax({
          type:'POST',
          url:"/admin/dashboard/paygo",
          data:{"_token":token,"appId":appId},
          success:function(res) {
            approvalAjax.render()
          }
        })
      }else {
        approvalAjax.$paygo.removeClass("loading")
        return false;
      }
    },

  }

  approvalAjax.init();
  chat.init()
})()
