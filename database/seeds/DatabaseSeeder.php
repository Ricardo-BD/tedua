<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->truncateTables([
            'configuracioncaves',
            'roles',
        	'users',
            'categorias',
            'estatus',
            'tipohabitacions',
            'habitacions',
            'categoriaps',
            'estados',
            'configuracions',
        ]);
        $this->call(UnidadSeeder::class);
        $this->call(SeccionSeeder::class);
        $this->call(MesaSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RolescafeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(EstatuSeeder::class);
        $this->call(TipohabitacionSeeder::class);
        $this->call(CategoriapSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(ConfiguracionSeeder::class);
        $this->call(ConfiguracioncafeSeeder::class);
        $this->call(DeliverySeeder::class);
        $this->call(CategoriapcafeSeeder::class);
        $this->call(CategoriaicafeSeeder::class);
        $this->call(EstatuscocinaSeeder::class);
        $this->call(EstatusservicioSeeder::class);
        $this->call(IngredienteSeeder::class);
        $this->call(PresentacionSeeder::class);
        $this->call(ProductocafeSeeder::class);
        $this->call(IngredientesproductoSeeder::class);
        $this->call(MediopagoSeeder::class);
        $this->call(TipopagoSeeder::class);
        $this->call(EstadoentregaSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(ClientecafeSeeder::class);
        $this->call(TipoventaSeeder::class);
        $this->call(UsercafeSeeder::class);
        $this->call(FormapagoSeeder::class);
    }

    protected function truncateTables(array $tables)
    {

	    DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

	    foreach ($tables as $table) {
            if($table != 'rolescaves' && $table != 'configuracioncaves'){
	    	  DB::table($table)->truncate();
            }else{

                DB::connection('tcafe')->table($table)->truncate();
            }
        }
            
	    

	    DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
	
	}
}
