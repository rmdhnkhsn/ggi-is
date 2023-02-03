<?php

use App\defectMenu;
use App\FinalInspectionDefect;
use App\Inspection;
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
        // $this->call(UserSeeder::class);

        $inspections = Inspection::all();
        $finalInspections = \App\finalInspection::where('t_v4801c_doco')
            ->orderByDesc('created_at')
            ->orderByDesc('start_inspector')
            ->get();
        $menus = defectMenu::with('defectSubMenu')->get();

        // foreach ($inspections as $key => $inspection) {
            foreach ($menus as $key => $menu) {
                foreach ($menu->defectSubMenu as $key2 => $subMenu) {
                    FinalInspectionDefect::create([
                        'final_inspection_id' => $finalInspections->first()->id,
                        'menu_final_id' => $menu->id,
                        'final_submenu_id' => $subMenu->id
                    ]);
                }
            }
        // }


        // dd(
        //     $inspections->first()->toArray(),
        //      $menus->first()->toArray()
        //     );
    }
}
