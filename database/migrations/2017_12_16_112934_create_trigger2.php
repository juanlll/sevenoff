<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(env('DB_CONNECTION') == 'mysql'){
        // DB::unprepared('
        //   CREATE TRIGGER `create_profile_appearance` AFTER INSERT ON `profiles`
        //   FOR EACH ROW INSERT INTO appearances(
        //   id,status,created_at,updated_at) 
        //   VALUES (new.id,1,new.created_at,new.updated_at)
        //   ');
      }

      if(env('DB_CONNECTION') == 'pgsql'){

        DB::unprepared('

         CREATE OR REPLACE FUNCTION public.insert_userinformation()
         RETURNS trigger AS
         $BODY$
         begin

            INSERT INTO public.user_information(id,status,created_at,updated_at)
            VALUES (new.id,0,new.created_at,new.updated_at);

         return new;
         End
         $BODY$
         LANGUAGE plpgsql VOLATILE
         COST 100;
         ALTER FUNCTION public.insert_userinformation()
         OWNER TO postgres;


         CREATE TRIGGER create_userinfo
         AFTER INSERT
         ON public.profiles
         FOR EACH ROW
         EXECUTE PROCEDURE public.insert_userinformation();
         ');

      }




    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     DB::unprepared('DROP TRIGGER `create_profile_appearance`');
   }
 }
