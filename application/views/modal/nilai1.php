<div id="calendar"></div>
<!-- BEGIN MODAL -->
<div class="modal fade none-border" id="event-modal">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <form id="formnilai">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
               <h4 class="modal-title">Form</h4>
            </div>
            <div class="modal-body p-20" id="isinilai"></div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
               <!--<button type="submit" class="btn btn-primary save-event waves-effect waves-light">Simpan</button>-->
            </div>
         </form>
      </div>
   </div>
</div>
<script>
!function($){"use strict";var CalendarApp=function(){this.$body=$("body")
this.$modal=$('#event-modal'),this.$event=('#external-events div.external-event'),this.$calendar=$('#calendar'),this.$saveCategoryBtn=$('.save-category'),this.$categoryForm=$('#add-category form'),this.$extEvents=$('#external-events'),this.$calendarObj=null};CalendarApp.prototype.onEventClick=function(calEvent,jsEvent,view){var $this=this;var tgl=moment(calEvent.start).format('YYYY-MM-DD');$.ajax({url:"<?php echo base_url();?>modalsetnilai",type:"POST",data:{tgl:tgl,cek:<?php echo $cek;?>,karyawan:<?php echo $karyawan->id_karyawan;?>},success:function(data){$('#formnilai')[0].reset();$('#event-modal').modal({backdrop:'static',keyboard:!1},'show');$("#isinilai").html(data)},error:function(jqXHR,textStatus,errorThrown){swal("Error!","","error")}})},CalendarApp.prototype.onSelect=function(start,end,allDay){var $this=this;var tgl=moment(start).format('YYYY-MM-DD');$.ajax({url:"<?php echo base_url();?>modalsetnilai",type:"POST",data:{tgl:tgl,cek:<?php echo $cek;?>,karyawan:<?php echo $karyawan->id_karyawan;?>},success:function(data){$('#formnilai')[0].reset();$('#event-modal').modal({backdrop:'static',keyboard:!1},'show');$("#isinilai").html(data)},error:function(jqXHR,textStatus,errorThrown){swal("Error!","","error")}});$this.$calendarObj.fullCalendar('unselect')},CalendarApp.prototype.init=function(){var date=new Date();var d=date.getDate();var m=date.getMonth();var y=date.getFullYear();var form='';var today=new Date($.now());var defaultEvents=[{title:'Hey!',start:new Date($.now()+158000000),className:'bg-purple'},{title:'See John Deo',start:today,end:today,className:'bg-success'},{title:'Meet John Deo',start:new Date($.now()+168000000),className:'bg-info'},{title:'Buy a Theme',start:new Date($.now()+338000000),className:'bg-primary'}];var $this=this;$this.$calendarObj=$this.$calendar.fullCalendar({slotDuration:'00:15:00',minTime:'08:00:00',maxTime:'19:00:00',defaultView:'month',handleWindowResize:!0,height:$(window).height()-200,header:{left:'prev,next',center:'title',right:'today'},events:<?php echo $event;?>,eventLimit:!0,selectable:!0,defaultDate:'<?php echo $tgl."-1";?>',eventClick:function(calEvent,jsEvent,view){$this.onEventClick(calEvent,jsEvent,view)},dayClick:function(date,allDay,jsEvent,view){var tgl=moment(date).format('YYYY-MM-DD');$.ajax({url:"<?php echo base_url();?>modalsetnilai",type:"POST",data:{tgl:tgl,cek:<?php echo $cek;?>,karyawan:<?php echo $karyawan->id_karyawan;?>},success:function(data){$('#formnilai')[0].reset();$('#event-modal').modal({backdrop:'static',keyboard:!1},'show');$("#isinilai").html(data)},error:function(jqXHR,textStatus,errorThrown){swal("Error!","","error")}})}});this.$saveCategoryBtn.on('click',function(){var categoryName=$this.$categoryForm.find("input[name='category-name']").val();var categoryColor=$this.$categoryForm.find("select[name='category-color']").val();if(categoryName!==null&&categoryName.length!=0){$this.$extEvents.append('<div class="external-event bg-'+categoryColor+'" data-class="bg-'+categoryColor+'" style="position: relative;"><i class="mdi mdi-checkbox-blank-circle m-r-10 vertical-middle"></i>'+categoryName+'</div>')}})},$.CalendarApp=new CalendarApp,$.CalendarApp.Constructor=CalendarApp}(window.jQuery),function($){"use strict";$.CalendarApp.init()}(window.jQuery)
</script>
