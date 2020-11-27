all passwords and emails are as follows
Chris.Donovan@yahoo.com     chris3135
Gabriel@gmail.com           gabriel3135
christineb@hotmail.com      christine3135

////

Please look at the database ddl to understand the relationships.
Image table is separate table with an fk of review table. Hence we must obtain the reviewid before adding it to the table.
Otherwise you will get an error. Process review table which has restid and userid which you can grab from a cookie or session object.
and then i created a method to give you the last id in the table which you can use to add the image.

Please note  make sure to watch the video i posted on discord or google how to handle image blobs. so that you can process them
in the ui/controller before passing the required variables to be added.