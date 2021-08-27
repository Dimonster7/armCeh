<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $t_o_p=['Год','Месяц','Квартал'];
      $a = array_rand(['Год','Месяц','Квартал']);
      $professions=['Без учета персонала', 'С учетом персонала'];
      $b=array_rand($professions);
      DB::table('sessions')->insert([
        'order_number'=>rand(5,15),
        'type_of_plan'=>$t_o_p[$a],
        'start_of_plan'=>rand(2012,2021).'.'.rand(1,12).'.'.rand(1,31),
        'end_of_plan'=>rand(2012,2021).'.'.rand(1,12).'.'.rand(1,31),
        'information_on_professions'=>$professions[$b],
        'duration_of_execution'=>rand(400,700),
        'progress'=>rand(0,100),
      ]);

      $t_o_p=['Токарно-винторезный','Ленточно-отрезной'];
      $a = array_rand(['Токарно-винторезный','Ленточно-отрезной']);
      $professions=['Головная', 'Заимствованная'];
      $b=array_rand(['Головная', 'Заимствованная']);
      DB::table('ordering')->insert([
        'order_number'=>rand(3,15),
        'order_name'=>str_random(1).rand(1,99).'-'.rand(1,10),
        'cipher_dse'=>str_random(1).rand(1,9).'-'.rand(1,99).'.'.rand(1,10),
        'cipher'=>rand(100,999),
        'count_dse'=>rand(10,99),
        'name_of_machine'=>$t_o_p[$a],
        'type_of_specification'=>$professions[$b],
        'operation_number'=>rand(1,20),
        'operation_start_dateTime'=>rand(2012,2021).'.'.'0'.rand(1,9).'.'.rand(1,31).' '.rand(10,23).':'.rand(10,59).':'.rand(10,59),
        'operation_end_dateTime'=>rand(2012,2021).'.'.'0'.rand(1,9).'.'.rand(1,31).' '.rand(10,23).':'.rand(10,59).':'.rand(10,59),
      ]);

      $status = ['в производстве', 'на запуск', 'приостановлено', 'завершено'];
      $e = array_rand(['в производстве', 'на запуск', 'приостановлено', 'завершено']);
      DB::table('batch')->insert([
        'batch'=>str_random(1).rand(1000,9999).'.'.rand(10,99).'.'.rand(10,99).'.'.rand(100,999),
        'route_list'=>rand(100,999),
        'cipher'=>rand(100,999),
        'batch_count'=>rand(1,10),
        'order'=>str_random(1).rand(1,9).'-'.rand(1,99),
        'start_dateTime'=>rand(2012,2021).'.'.'0'.rand(1,9).'.'.rand(1,31).' '.rand(10,23).':'.rand(10,59).':'.rand(10,59),
        'end_dateTime'=>rand(2012,2021).'.'.'0'.rand(1,9).'.'.rand(1,31).' '.rand(10,23).':'.rand(10,59).':'.rand(10,59),
        'status' =>$status[$e],
      ]);

      $t_o_p=['гибка','гильотнная резка','термическая резка'];
      $a = array_rand(['гибка','гильотинная резка','термическая резка']);
      $professions=['Рабочев Р.Р', 'Мастеров М.М'];
      $b=array_rand(['Рабочев Р.Р', 'Мастеров М.М']);
      $equipment=['Резак', 'Гильотина'];
      $c=array_rand(['Резак', 'Гильотина']);
      $t_o_pp=['Токарно-винторезный','Ленточно-отрезной'];
      $d = array_rand(['Токарно-винторезный','Ленточно-отрезной']);
      $status = ['в работе','завершено'];
      $e = array_rand(['в работе','завершено']);
      DB::table('tasks')->insert([
        'client_id_routelist'=>rand(100,999),
        'route_list'=>rand(100,999),
        'order_name'=>str_random(1).rand(1,99).'-'.rand(1,10),
        'name_dse'=>str_random(1).rand(1,9).'-'.rand(1,99).'.'.rand(1,10),
        'cipher_dse'=>str_random(1).rand(1,9).'-'.rand(1,99).'.'.rand(1,10),
        'cipher'=>rand(100,999),
        'name_of_machine'=>$t_o_pp[$d],
        'batch_count'=>rand(1,10),
        'operation_number'=>rand(1,30),
        'operation_name'=>$t_o_p[$a],
        'progress'=>rand(0,100),
        'performer'=>$professions[$b],
        'equipment'=>$equipment[$c],
        'status' =>$status[$e],
        'start_dateTime'=>rand(2012,2021).'.'.'0'.rand(1,9).'.'.rand(1,31).' '.rand(10,23).':'.rand(10,59).':'.rand(10,59),
        'end_dateTime'=>rand(2012,2021).'.'.'0'.rand(1,9).'.'.rand(1,31).' '.rand(10,23).':'.rand(10,59).':'.rand(10,59),
      ]);
    }
}
