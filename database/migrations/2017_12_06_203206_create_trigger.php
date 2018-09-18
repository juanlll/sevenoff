<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(env('DB_CONNECTION') == 'pgsql'){
            DB::unprepared('

                CREATE OR REPLACE FUNCTION public.insert_profile()
                RETURNS trigger AS
                $BODY$
                begin

                insert into public.profiles(
                    id, 
                    name,
                    status, 
                    "idCategory",                                    
                    created_at, 
                    updated_at)
                    VALUES (new.id,new.name,1,1,new.created_at,new.updated_at);

                    return new;
                    End
                    $BODY$
                    LANGUAGE plpgsql VOLATILE
                    COST 100;
                    ALTER FUNCTION public.insert_profile()
                    OWNER TO postgres;


  CREATE TRIGGER create_profile
  AFTER INSERT
  ON public.users
  FOR EACH ROW
  EXECUTE PROCEDURE public.insert_profile();

                    ');
        }

        if(env('DB_CONNECTION') == 'mysql'){
            DB::unprepared('
                CREATE TRIGGER `create_profile` AFTER INSERT ON `users`
                FOR EACH ROW INSERT INTO `profiles`(`id`, `name`, `phone`, `idCategory`, `lng`, `lat`, `web`, `address`, `description`, `status`,`facebook`,`instagram`,`twitter`,`created_at`, `updated_at`) VALUES (new.id,new.name,0,1,1,1,1,1,1,1,"fb","inst","tw",new.created_at,new.updated_at)
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
      DB::unprepared('DROP TRIGGER `create_profile`');
      
  }
}
