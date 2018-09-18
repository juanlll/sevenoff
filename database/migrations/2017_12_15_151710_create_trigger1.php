<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if(env('DB_CONNECTION') == 'mysql'){
        DB::unprepared('
          CREATE TRIGGER create_profile_appearance AFTER INSERT ON profiles
          FOR EACH ROW INSERT INTO appearances(
          id,status,created_at,updated_at) 
          VALUES (new.id,1,new.created_at,new.updated_at)
          ');
      }

      if(env('DB_CONNECTION') == 'pgsql'){

        DB::unprepared('

         CREATE OR REPLACE FUNCTION public.insert_appearance()
         RETURNS trigger AS
         $BODY$
         begin

         INSERT INTO public.appearances(id,status,created_at,updated_at)
         VALUES (new.id,1,new.created_at,new.updated_at);

         return new;
         End
         $BODY$
         LANGUAGE plpgsql VOLATILE
         COST 100;
         ALTER FUNCTION public.insert_appearance()
         OWNER TO postgres;


         CREATE TRIGGER create_apperance
         AFTER INSERT
         ON public.profiles
         FOR EACH ROW
         EXECUTE PROCEDURE public.insert_appearance();
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
