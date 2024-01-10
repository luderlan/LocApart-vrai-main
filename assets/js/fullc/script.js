$(document).ready(function(){
  
        var calendar = $('#calendar').fullCalendar({
            header:{
                left: 'prev,next today',
                center: 'title',
                right: 'agendaWeek,agendaDay'
            },
            defaultView: 'agendaWeek',
            editable: true,
            selectable: true,
            allDaySlot: false,
            
            events: '',
           
            
            
            eventClick: function(event, jsEvent, view) {
                // Convertir les horaires de début et de fin de l'événement en formats lisibles
                endtime = $.fullCalendar.moment(event.end).format('h:mm');
                starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
                
                // Concaténer les horaires pour afficher dans la boîte de dialogue
                var mywhen = starttime + ' - ' + endtime;
                
                // Mettre à jour le contenu de la boîte de dialogue avec les détails de l'événement
                $('#modalTitle').html(event.title);
                                $('#modalTitle').html(event.title);

                $('#modalWhen').text(mywhen);
                
                // Remplir un champ de formulaire invisible avec l'identifiant de l'événement
                $('#eventID').val(event.id);
                
                // Afficher la boîte de dialogue modale
                $('#calendarModal').modal();
            },
            
            
            //header and other values
            select: function(start, end, jsEvent) {
              
                endtime = $.fullCalendar.moment(end).format('h:mm');
                starttime = $.fullCalendar.moment(start).format('dddd, MMMM Do YYYY, h:mm');

              
                var mywhen = starttime + ' - ' + endtime;
                start = moment(start).format();
                 end = moment(end).format();
                $('#createEventModal #startTime').val(start);
                $('#createEventModal #endTime').val(end);
                $('#createEventModal #when').text(mywhen);
                $('#createEventModal').modal('toggle');
           },
           eventDrop: function(event, delta){
               $.ajax({
                   url: '../../php/traitement/trait.reservation.php',
                   data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id ,
                   type: "POST",
                   success: function(json) {
                   }
               });
           },

           eventResize: function(event) {
               $.ajax({
                   url: '../../php/traitement/trait.reservation.php',
                   data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id,
                   type: "POST",
                   success: function(json) {
                   }
               });
           }
        });
               
       $('#submitButton').on('click', function(e){
           
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doSubmit();
       });
       
       $('#deleteButton').on('click', function(e){
           // We don't want this to act as a link so cancel the link action
           e.preventDefault();
           doDelete();
       });
       
       function doDelete(){
           $("#calendarModal").modal('hide');
           var eventID = $('#eventID').val();
           $.ajax({
               url: '../../php/traitement/trait.reservation.php',
               data: 'action=delete&id='+eventID,
               type: "POST",
               success: function(json) {
                   if(json == 1)
                        $("#calendar").fullCalendar('removeEvents',eventID);
                   else
                        return false;
                    
                   
               }
           });
       }
       function doSubmit(){

       
           $("#createEventModal").modal('hide');
           var titre = $('#titre').val();
           var date_rese = $('#date_rese').val();
           var startTime = $('#startTime').val();
           var end = $('#end').val();
           var commentaire = $('#commentaire').val();
           var moderation = $('#moderation').val();
           var annulation = $('#annulation').val();
           var id_bien = $('#id_bien').val();
           var id_client = $('#id_client').val();
           

           $.ajax({
           
               url: '../../php/traitement/trait.reservation.php',
               data: 'action=add&titre='+titre+'&date_rese='+date_rese+'&start='+startTime+'&end='+end+
               '&commentaire='+commentaire+'&moderation='+moderation+'&annulation='+annulation+'&id_bien='+id_bien+'&id_client='+id_client,
               type: "POST",
               success: function(json) {
                   $("#calendar").fullCalendar('renderEvent',
                   {
                       id: json.id,
                       titre: titre,
                       date_rese: date_rese,
                       start: startTime,
                       end: end,
                       commentaire: commentaire,
                       moderation: moderation,
                       annulation: annulation,
                       id_bien: id_bien,
                       id_client: id_client,
                   },
                   true);
               }
           });
           
       }
    });