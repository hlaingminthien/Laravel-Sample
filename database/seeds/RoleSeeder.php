<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Permission; 

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Level1
        $level1 = new Role();
        $level1->name = 'Level1';
        $level1->display_name = 'level1';
        $level1->description = 'The person who can give all permission ';
        $level1->save();
       
        //Admin Level2

        $level2 = new Role();
        $level2->name = 'Level2';
        $level2->display_name = 'level2';
        $level2->description = 'Check company(employeer) and user(employee) information';
        $level2->save();
       
        //Admin Level3

        $level3 = new Role();
        $level3->name = 'Level3';
        $level3->display_name = 'level3';
        $level3->description = 'Marketing Staff who need to find company born and employee';
        $level3->save();
       
        //Employeer

        $employeer = new Role();
        $employeer->name = 'Employeer';
        $employeer->display_name = 'Employeer';
        $employeer->description = 'To find employee';
        $employeer->save();
      
        //Employee
        $employee = new Role();
        $employee->name = 'Employee';
        $employee->display_name = 'User';
        $employee->description = 'The person who can find jobs';
        $employee->save();

        //Userseeder
        $level1_account=User::create([
            'id'=>'e5643410-e5c8-11e9-bf75-6519d98c813f',
            'name'=>'Level1',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'email'=>'level1@gmail.com',
            'phone'=>'09454545455',
            'photo'=>'level1.jpg',
            'nrc'=>'9/MMN(N)098782',
            'gender'=>'female',
            'race'=>'Burmese',
            'religious'=>'Buddhist',
            'native_town'=>'Yangon',
            'date_of_birth'=>'19-9-1991',
            'weight'=>'150',
            'height'=>'5',
            'marital_status'=>'Single',
            'health'=>'Good',
            'address'=>'No.2/YKK(9)/Pyin Oo Lwin',
            'emergency_contact_name'=>'Su Su',
            'emergency_phone'=>'0987686898',
            'relation_with_econtact'=>'Mother',
            'password'=>\Hash::make('abc123'), 
            'active'=>1,
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            ]);
        $level1_account->roles()->attach($level1->id);


        $level2_account=User::create([
            'id'=>'e56c8380-e5c8-11e9-adf3-219a2eafe06f',
            'name'=>'Level2',
            'state_id'=>'57c67add-d35b-4d1e-8bef-10a66d9e9402',
            'email'=>'level2@gmail.com',
            'phone'=>'09454545456',
            'photo'=>'level2.jpg',
            'nrc'=>'9/MMN(N)222222',
            'gender'=>'female',
            'race'=>'Burmese',
            'religious'=>'Buddhist',
            'native_town'=>'Yangon',
            'date_of_birth'=>'19-9-1992',
            'weight'=>'150',
            'height'=>'5',
            'marital_status'=>'Single',
            'health'=>'Good',
            'address'=>'No.2/YKK(9)/Mandalay',
            'emergency_contact_name'=>'Aung Aung',
            'emergency_phone'=>'0987686898',
            'relation_with_econtact'=>'Father',
            'password'=>\Hash::make('abc123'), 
            'active'=>1,
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            ]);
        $level2_account->roles()->attach($level2->id);


        $level3_account=User::create([
            'id'=>'e573d580-e5c8-11e9-b4b7-bd674b3e09ba',
            'state_id'=>'22062b80-21be-11e8-8e88-07aab376387d',
            'name'=>'Level3',
            'email'=>'level3@gmail.com',
            'phone'=>'09454545457',
            'photo'=>'level3.jpg',
            'nrc'=>'9/MMN(N)333333',
            'gender'=>'female',
            'race'=>'Burmese',
            'religious'=>'Buddhist',
            'native_town'=>'Yangon',
            'date_of_birth'=>'19-9-1993',
            'weight'=>'150',
            'height'=>'5',
            'marital_status'=>'Single',
            'health'=>'Good',
            'address'=>'No.2/YKK(9)/Yangon',
            'emergency_contact_name'=>'Mya Mya',
            'emergency_phone'=>'0987686898',
            'relation_with_econtact'=>'Mother',
            'password'=>\Hash::make('abc123'), 
            'active'=>1,
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            ]);
        $level3_account->roles()->attach($level3->id);

        $employeer_account=User::create([
            'id'=>'e57b2db0-e5c8-11e9-9bc2-6170f3c18913',
            'name'=>'MS Management',
            'email'=>'ms@gmail.com',
            'phone'=>'09454545458',
            'gender'=>'female',
            'password'=>\Hash::make('abc123'), 
            'active'=>0,
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            ]);
        $employeer_account->roles()->attach($employeer->id);

         $employeer_account=User::create([
            'id'=>'62e9099c-edf7-4acb-9914-6c07d189a4f0',
            'name'=>'HG',
            'email'=>'hg@gmail.com',
            'phone'=>'09464646468',
            'gender'=>'male',
            'password'=>\Hash::make('abc123'), 
            'active'=>0,
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            ]);
        $employeer_account->roles()->attach($employeer->id);

        $employeer_account=User::create([
            'id'=>'cbb37ce0-71d9-4d21-813f-647419a11ef4',
            'name'=>'M Plus',
            'email'=>'mplus@gmail.com',
            'phone'=>'09474747478',
            'gender'=>'male',
            'password'=>\Hash::make('abc123'), 
            'active'=>0,
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            ]);
        $employeer_account->roles()->attach($employeer->id);

        $employee_account=User::create([
            'id'=>'e58289a0-e5c8-11e9-8623-93124065b504',
            'name'=>'Employee',
            'email'=>'employee@gmail.com',
            'phone'=>'09454545459',
            'gender'=>'female',
            'password'=>\Hash::make('abc123'), 
            'active'=>1,
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            ]);
        $employee_account->roles()->attach($employee->id);


      // PERMISSION SEEDER
    
    //Create

        $create_permission = new Permission();
        $create_permission->name = 'create';
        $create_permission->display_name = 'Create Permission';
        $create_permission->description = 'User can create new record.';
        $create_permission->save();

    //Update
        $update_permission = new Permission();
        $update_permission->name = 'update';
        $update_permission->display_name = 'Update Permission';
        $update_permission->description = 'User can update existing record.';
        $update_permission->save();
   
    //View
        $view_permission = new Permission();
        $view_permission->name = 'view';
        $view_permission->display_name = 'View Permission';
        $view_permission->description = 'User can view a record.';
        $view_permission->save();

    //Delete

        $delete_permission = new Permission();
        $delete_permission->name = 'delete';
        $delete_permission->display_name = 'Delete Permission';
        $delete_permission->description = 'User can delete existing record.';
        $delete_permission->save();

    //Admin
   
        $level1_permission = new Permission();
        $level1_permission->name = 'Level1';
        $level1_permission->display_name = 'Level1 Permission';
        $level1_permission->description = 'Level1 can manage Level2 and Level3 and Company and User.';
        $level1_permission->save();

        $level2_permission = new Permission();
        $level2_permission->name = 'Level2';
        $level2_permission->display_name = 'Level2 Permission';
        $level2_permission->description = 'Level2 can manage Level3 and Company and Users.';
        $level2_permission->save();


        $level3_permission = new Permission();
        $level3_permission->name = 'Level3';
        $level3_permission->display_name = 'Level3 Permission';
        $level3_permission->description = 'Level3 can manage Company and Users.';
        $level3_permission->save();


      //Employeer

        $employeer_permission = new Permission();
        $employeer_permission->name = 'Employeer';
        $employeer_permission->display_name = 'Employeer Permission';
        $employeer_permission->description = 'Employeer can mange the employee who applied their jobs';
        $employeer_permission->save();


        $employee_permission = new Permission();
        $employee_permission->name = 'Employee';
        $employee_permission->display_name = 'Employee Permission';
        $employee_permission->description = 'Employee can apply their jobs';
        $employee_permission->save();

    //Attach permissions and roles

        $create_permission->roles()->attach([$level1->id,$level2->id,$level3->id,$employeer->id,$employee->id]);
        $update_permission->roles()->attach([$level1->id,$level2->id,$level3->id,$employeer->id,$employee->id]);
        $view_permission->roles()->attach([$level1->id,$level2->id,$level3->id,$employeer->id,$employee->id]);
        $delete_permission->roles()->attach([$level1->id,$level2->id,$level3->id,$employeer->id,$employee->id]);
        $level1_permission->roles()->attach($level1->id);
        $level2_permission->roles()->attach($level2->id);
        $level3_permission->roles()->attach($level3->id);
        $employeer_permission->roles()->attach($employeer->id);
        $employee_permission->roles()->attach($employee->id);
        
      
      
    }
}
