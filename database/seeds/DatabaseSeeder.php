<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypeTableSeeder::class);
        $this->call(SpecialityTableSeeder::class);
        $this->call(GouvernerateTableSeeder::class);
        $this->call(InsuranceTableSeeder::class);
        $this->call(EstablishmentTableSeeder::class);
        $this->call(EstablishmentHasSpecialityTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(IndicatorTableSeeder::class);
        $this->call(AnalysePredefTableSeeder::class);
        $this->call(AnalysePredefHasIndicatorTableSeeder::class);
    }
}

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('types')->insert([
                'titre'=>'cabinet',

            ]);
        DB::table('types')->insert([
                'titre'=>'clinique',

            ]);
        DB::table('types')->insert([
                'titre'=>'radio',

            ]);
        DB::table('types')->insert([
                'titre'=>'laboratoire',

        ]);
        DB::table('types')->insert([
                'titre'=>'pharmacie de nuit',

        ]);
        DB::table('types')->insert([
                'titre'=>'pharmacie de jour',

        ]);
        DB::table('types')->insert([
                'titre'=>'hôpital',

        ]);
        DB::table('types')->insert([
                'titre'=>'centre de rééducation',

        ]);
        DB::table('types')->insert([
                'titre'=>'opticien',

        ]);
        DB::table('types')->insert([
                'titre'=>'paramédical',

        ]);
        DB::table('types')->insert([
                'titre'=>'thérapie',

        ]);
        DB::table('types')->insert([
                'titre'=>'vétérinaire',

        ]);
        DB::table('types')->insert([
                'titre'=>'grossiste',

        ]);
        DB::table('types')->insert([
                'titre'=>'association',

        ]);
        DB::table('types')->insert([
                'titre'=>'urgence',

        ]);
        DB::table('types')->insert([
                'titre'=>'audiologiste',

        ]);  
        DB::table('types')->insert([
                'titre'=>'centre médical domicile',

        ]); 
        DB::table('types')->insert([
                'titre'=>'polyclinique',

        ]);
        DB::table('types')->insert([
                'titre'=>'salle de soin',

        ]);
                DB::table('types')->insert([
                'titre'=>'centre thalassothérapie',

        ]);
        DB::table('types')->insert([
                'titre'=>'centre de hémodialyse',

        ]);
        DB::table('types')->insert([
                'titre'=>'société de transport sanitaire',

        ]);
        DB::table('types')->insert([
            'titre'=>'siège sociale',

        ]);
    }
}
class SpecialityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialities')->insert([
                'intituleEtab'=>'Non professionnel',
                'intituleProf'=>'Non professionnel',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Acupuncture',
                'intituleProf'=>'Acupuncteur',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Anatomie pathologique',
                'intituleProf'=>'Anatomiste pathologique',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Anesthesie & Anesthesie Reanimation',
                'intituleProf'=>'Anesthesiste & Anesthesiste de Reanimation',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Angiologie',
                'intituleProf'=>'Angiologue',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Audiologie',
                'intituleProf'=>'Audiologiste',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Bacteriologie & Microbiologie',
                'intituleProf'=>'Bacteriologiste & Microbiologiste',
            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Biochimie',
                'intituleProf'=>'Biochimiste',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Biologie Clinique',
                'intituleProf'=>'Biologiste Clinique',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Biophysique Et Medecine Nucleaire',
                'intituleProf'=>'Biophysicien Et Medecin Nucleaire',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Carcinologie Médicale',
                'intituleProf'=>'Carcinologue Médicale',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Cardiologie',
                'intituleProf'=>'Cardiologue',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Chirurgie buccale et dentaire',
                'intituleProf'=>'Chirurgien buccale et dentaire',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Chirurgie Carcinologie',
                'intituleProf'=>'Chirurgien Carcinologie',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Chirurgie Cardio-vasculaire & Peripherique',
                'intituleProf'=>'Chirurgien Cardio-vasculaire & Peripherique',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Chirurgie Generale',
                'intituleProf'=>'Chirurgien Generale',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Chirurgie Neurologique',
                'intituleProf'=>'Chirurgien Neurologique',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Chirurgie Orthopedique et Traumatologique',
                'intituleProf'=>'Chirurgien Orthopedique et Traumatologique',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Chirurgie Pediatique',
                'intituleProf'=>'Chirurgien Pediatique',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Chirurgie Plastique Reparatrice Et Estitique',
                'intituleProf'=>'Chirurgien Plastique Reparatrice Et Estitique',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Chirurgie Thoracique',
                'intituleProf'=>'Chirurgien Thoracique',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Chirurgie Urologique',
                'intituleProf'=>'Chirurgien Urologique',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Dentisterie',
                'intituleProf'=>'Dentiste',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Dermatologie',
                'intituleProf'=>'Dermatologue',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Endocrinologie - Diabétologie',
                'intituleProf'=>'Endocrinologue - Diabétologue',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Gastro-enterologie',
                'intituleProf'=>'Gastro-enterologue',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Gynecologie-obstetrique',
                'intituleProf'=>'Gynecologue-obstetrique',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Hematologie Biologique',
                'intituleProf'=>'Hematologue Biologique',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Hematologie Clinique',
                'intituleProf'=>'Hematologue Clinique',

            ]);
         DB::table('specialities')->insert([
                'intituleEtab'=>'Hémodialyse',
                'intituleProf'=>'Hémodialyste',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Imagerie Médicale',
                'intituleProf'=>'Manipulateur en Imagerie Médicale',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Immunologie & Virologie',
                'intituleProf'=>'Immunologue & Virologie',


            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Implantologie orale',
                'intituleProf'=>'Implantologue orale',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Medecine de travail',
                'intituleProf'=>'Medecin de travail',

            ]);

        DB::table('specialities')->insert([
                'intituleEtab'=>'Medecine Generale',
                'intituleProf'=>'Généraliste',

            ]);
        DB::table('specialities')->insert([
            'intituleEtab'=>'Medecine interne',
            'intituleProf'=>'Medecin interne',

        ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Medecine Physique',
                'intituleProf'=>'Medecin Physique',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Medecine Preventive et sociale',
                'intituleProf'=>'Medecin Preventive et sociale',

            ]);

        DB::table('specialities')->insert([
                'intituleEtab'=>'Nephrologie',
                'intituleProf'=>'Nephrologue',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Neurologie',
                'intituleProf'=>'Neurologue',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Nutrition',
                'intituleProf'=>'Nutritionniste',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Opticien',
                'intituleProf'=>'Opticien',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Ophtalmologie',
                'intituleProf'=>'Ophtalmologue',
            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'ORL (Oto-Rhino-Laryngologie) et Chirurgie cervico-faciale',
                'intituleProf'=>'ORL (Oto-Rhino-Laryngologiste) et Chirurgien cervico-faciale',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Orthopedie Dento Faciale',
                'intituleProf'=>'Orthopediste Dento Faciale',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Pediatrie',
                'intituleProf'=>'Pediatre',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Pédodontisterie',
                'intituleProf'=>'Pédodontiste',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Pharmacie',
                'intituleProf'=>'Pharmacien',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Physiologie & Exploration Fonctionnelle',
                'intituleProf'=>'Physiologue & Explorateur Fonctionnelle',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Physiotherapie (kinesitherapie)',
                'intituleProf'=>'Physiotherapeute (kinesitherapie)',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Pneumo-phtisiologie',
                'intituleProf'=>'Pneumo-phtisiologue',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Psychiatrie',
                'intituleProf'=>'Psychiatre',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Psychiatrie Infantile',
                'intituleProf'=>'Psychiatre Infantile',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Radiologie (diagnostic)',
                'intituleProf'=>'Radiologue (diagnostic)',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Radiotherapie',
                'intituleProf'=>'Radiotherapeute',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Reanimation Medicale',
                'intituleProf'=>'Reanimateur',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Rééducation',
                'intituleProf'=>'Clinet',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Rhumatologie',
                'intituleProf'=>'Rhumatologue',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Sage-Femme',
                'intituleProf'=>'Sage-Femme',

            ]);       
        DB::table('specialities')->insert([
                'intituleEtab'=>'Service',
                'intituleProf'=>'Spécialiste en Service',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Stomatologie et Chirurgie Maxillo-faciale',
                'intituleProf'=>'Stomatologue et Chirurgien Maxillo-faciale',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Thalassothérapie',
                'intituleProf'=>'Thalassothérapiste',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Toutes les spécialités',
                'intituleProf'=>'Toutes les spécialités',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Urgence',
                'intituleProf'=>'Urgentiste',

            ]);
        DB::table('specialities')->insert([
                'intituleEtab'=>'Urologie',
                'intituleProf'=>'Urologue',

            ]);
    }

}
class GouvernerateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gouvernerate')->insert([
            'name' => 'Ariana',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Beja',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Ben Arous',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Bizerte',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Gabes',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Gafsa',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Jendouba',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Kairouan',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Kasserine',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Kébilli',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Kef',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Mahdia',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Mannouba',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Mednine',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Monastir',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Nabeul',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Sfax',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Sidi Bouzid',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Siliana',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Sousse',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Tataouine',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Tozeur',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Tunis',

        ]);
        DB::table('gouvernerate')->insert([
            'name' => 'Zaghouan',

        ]);
    }

}
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'root',
            'email' => 'root@gmail.com',
            'password' => bcrypt('iwtgth@@@224'),
            'tel' => '53741504',
            'role' => '10',
            'gradeHonor' => 'root',
            'speciality_id' => '1',
            'establishment_id' => '1',

        ]);
        DB::table('users')->insert([
            'name' => 'faten letaief',
            'email' => 'letaieffaten@gmail.com',
            'password' => bcrypt('faten123'),
            'tel' => '53741504',
            'role' => '10',
            'gradeHonor' => 'new',
            'speciality_id' => '1',
            'image' => '6tsb-faten letaief.jpg',
            'establishment_id' => '1',

        ]);
        DB::table('users')->insert([
            'name' => 'fares letaief',
            'email' => 'etoilistesahlino@yahoo.fr',
            'password' => bcrypt('fares@@@'),
            'tel' => '22572781',
            'role' => '20',
            'gradeHonor' => 'faculté de médecine de monastir, et hôpital régional de Moknine',
            'speciality_id' => '35',
            'image' => 'nA9Jfaresletaief.jpg',
            'establishment_id' => '2',
        ]);
        DB::table('users')->insert([
            'name' => 'nabila letaief',
            'email' => 'nabila@gmail.com',
            'password' => bcrypt('nabila@@@'),
            'tel' => '54987123',
            'role' => '20',
            'gradeHonor' => 'faculté de médecine de monastir, et hôpital régional de Djerba',
            'speciality_id' => '35',
            'establishment_id' => '3',

        ]);
        DB::table('users')->insert([
            'name' => 'nada naddou',
            'email' => 'nada@gmail.com',
            'password' => bcrypt('nadanada'),
            'tel' => '52315456',
            'role' => '30',
            'gradeHonor' => 'Niveau bac',
            'speciality_id' => '1',
            'establishment_id' => '3',

        ]);
        DB::table('users')->insert([
            'name' => 'rabeb rabeb',
            'email' => 'rabeb@gmail.com',
            'password' => bcrypt('rabeb@@@'),
            'tel' => '21345890',
            'role' => '30',
            'gradeHonor' => 'License fondamentale de sciences médicaux',
            'speciality_id' => '1',
            'establishment_id' => '4',

        ]);
        DB::table('users')->insert([
            'name' => 'Imen ABED',
            'email' => 'iman@gmail.com',
            'password' => bcrypt('imen@@@'),
            'tel' => '22748128',
            'role' => '20',
            'gradeHonor' => 'License fondamentale de biologie',
            'speciality_id' => '9',
            'establishment_id' => '4',

        ]);
        DB::table('users')->insert([
            'name' => 'Nizar ABDERRAHIM',
            'email' => 'nizar.abder@gmail.com',
            'password' => bcrypt('nizar123'),
            'tel' => '+216 75 279 164',
            'role' => '20',
            'gradeHonor' => 'Chirurgie dentaire affilié le 15-10-2009',
            'speciality_id' => '13',
            'establishment_id' => '5',

        ]);
    }}

class EstablishmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tab =Array
        (
            'jours' => Array
            (
                0 => 0,
            1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6
        ),

    'freq' => 120,
    'time' => Array
    (
        0 => Array
        (
            'matin' => Array
            (
                'deb' => '08:00',
                            'fin' => '13:00'
                        ),

                    'soir' => Array
    (
        'deb' => '14:00',
                            'fin' => '18:00'
                        )

                ),

            1 => Array
    (
        'matin' => Array
        (
            'deb' => '08:00',
                            'fin' => '13:00'
                        ),

                    'soir' => Array
    (
        'deb' => '14:00',
                            'fin' => '18:00'
                        )

                ),
        2 => Array
        (
            'matin' => Array
            (
                'deb' => '08:00',
                'fin' => '13:00'
            ),

            'soir' => Array
            (
                'deb' => '14:00',
                'fin' => '18:00'
            )

        ),
        3 => Array
        (
            'matin' => Array
            (
                'deb' => '08:00',
                'fin' => '13:00'
            ),

            'soir' => Array
            (
                'deb' => '14:00',
                'fin' => '18:00'
            )

        ),
        4 => Array
        (
            'matin' => Array
            (
                'deb' => '08:00',
                'fin' => '13:00'
            ),

            'soir' => Array
            (
                'deb' => '14:00',
                'fin' => '18:00'
            )

        ),
        5 => Array
        (
            'matin' => Array
            (
                'deb' => '08:00',
                'fin' => '13:00'
            ),

            'soir' => Array
            (
                'deb' => '14:00',
                'fin' => '18:00'
            )

        ),
        6 => Array
        (
            'matin' => Array
            (
                'deb' => '10:00',
                'fin' => '13:00'
            )

        ),
));

        DB::table('establishment')->insert([
            'nameE' => 'siège sociale',
            'email' => 'letaieffaten@docteur.tn',
            'address' => '552 Rue Kissra - Moknine 5050 - Monastir, Gouvernorat de Tunis, Tunisie',
            'textLatlng' => ' 36.8484074, 10.18997360000003',
            'tel' => '(+216) 43 221 426',
            'type_id' => '23',
            'logo' => 'logo.PNG',
          'horaire' => serialize($tab),

        ]);


       $tab =Array
        (
            'jours' => [
                0 => 0,
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6
        ],

    'freq' => [30], 'time' => Array(
        0 => Array
        (
            'matin' => Array
            ('deb' => "08:00", 'fin' => "12:00"),

            'soir' => Array
    (
        'deb' => "14:00", 'fin' => "18:00")
        ),
        1 => Array(
        'matin' => Array('deb' => "08:00", 'fin' => "12:00"),

        'soir' => Array('deb' => "14:00", 'fin' => "18:00")
        ),

            2 => Array
    (
        'matin' => Array
        ('deb' =>"08:00", 'fin' => "12:00"), 'soir' => Array
    ('deb' => "14:00",'fin' => "17:00")
            ),
        3 => Array
    ('matin' => Array(
            'deb' => "08:00", 'fin' => "12:00"),
            'soir' => Array
    ('deb' => "14:00", 'fin' => "17:00")),
        4 => Array('matin' => Array
        ('deb' => "08:00", 'fin' => "13:00"),

       'soir' => Array
    ('deb' => "15:00", 'fin' => "18:00")),
        5 => Array
    ('matin' => Array
        ('deb' => "08:00", 'fin' => "13:00")),
        6 => Array
    ('matin' => Array
        ('deb' => "08:00",'fin' => "12:00"),

        )));

        DB::table('establishment')->insert([
            'nameE' => 'clinique pasteur',
            'email' => 'contact@cliniquePasteur.com.tn',
            'address' => 'Centre Urbain Nord 1082 - Tunis, Gouvernorat de Tunis, Tunisie',
            'textLatlng' => ' 36.8484074, 10.18997360000003',
            'tel' => '(+216) 36 402 000',
            'tel1' => '(+216) 36 402 000',
            'type_id' => '2',
            'logo' => 'z1kQ-clinique pasteur.PNG',
            'horaire' => serialize($tab),

        ]);
        $tab =Array
        (
            'jours' => [
                0 => 0,
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6
            ],

            'freq' => [90], 'time' => Array(
                0 => Array
                (
                    'matin' => Array
                    ('deb' => "08:00", 'fin' => "13:00"),

                    'soir' => Array
                    (
                        'deb' => "14:00", 'fin' => "23:00")
                ),
                1 => Array(
                    'matin' => Array('deb' => "08:00", 'fin' => "13:00"),

                    'soir' => Array('deb' => "14:00", 'fin' => "23:00")
                ),

                2 => Array
                (
                    'matin' => Array
                    ('deb' =>"08:00", 'fin' => "13:00"), 'soir' => Array
                    ('deb' => "14:00",'fin' => "23:00")
                ),
                3 => Array
                ('matin' => Array(
                        'deb' => "08:00", 'fin' => "13:00"),
                    'soir' => Array
                    ('deb' => "14:00", 'fin' => "23:00")),
                4 => Array('matin' => Array
                ('deb' => "08:00", 'fin' => "13:00"),

                    'soir' => Array
                    ('deb' => "15:00", 'fin' => "22:00")),
                5 => Array
                ('matin' => Array
                    ('deb' => "08:00", 'fin' => "13:00"),'soir' => Array
                    ('deb' => "15:00", 'fin' => "22:00")),

                6 => Array
                ('matin' => Array
                    ('deb' => "08:00",'fin' => "12:00"),

                )));

        DB::table('establishment')->insert([
            'nameE' => 'Polyclinique Jerba la Douce',
            'address' => 'Zone touristique - 4128 Djerba - Tunisie',
            'textLatlng' => '33.8075978, 10.845146699999987',
            'tel' => '00 216 75 730 100',
            'tel1' => '00 216 50 530 437',
            'type_id' => '18',
            'logo' => 'Dvhj-polyclinique jerba la douce.JPG',
            'horaire' => serialize($tab),

        ]);
        $tab =Array
        (
            'jours' => [
                0 => 0,
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4
            ],

            'freq' => [60], 'time' => Array(
                0 => Array
                (
                    'matin' => Array
                    ('deb' => "08:00", 'fin' => "13:00"),

                    'soir' => Array
                    (
                        'deb' => "14:00", 'fin' => "16:00")
                ),
                1 => Array(
                    'matin' => Array('deb' => "08:00", 'fin' => "13:00"),

                    'soir' => Array('deb' => "14:00", 'fin' => "16:00")
                ),

                2 => Array
                (
                    'matin' => Array
                    ('deb' =>"08:00", 'fin' => "13:00"), 'soir' => Array
                    ('deb' => "14:00",'fin' => "16:00")
                ),
                3 => Array
                ('matin' => Array(
                        'deb' => "08:00", 'fin' => "13:00"),
                    'soir' => Array
                    ('deb' => "14:00", 'fin' => "16:00")),
                4 => Array('matin' => Array
                ('deb' => "08:00", 'fin' => "13:00")

                )));

        DB::table('establishment')->insert([
            'nameE' => 'Laboratoire biosource',
            'address' => ' 55 avenue khairdeddine pacha - 1073 Monplaisir - Tunis, Gouvernorat de Tunis, Tunisie',
            'textLatlng' => '36.82158, 10.189814500000011',
            'email' => 'bio-source@biosource-tunisie.com',
            'tel' => '00 216 71 908 344',
            'tel1' => '00 216 71 908 434',
            'type_id' => '4',
            'logo' => 'qNJV-biosource.JPG',
            'horaire' => serialize($tab),

        ]);


        $tab =Array
        (
            'jours' => [
                0 => 0,
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6
            ],

            'freq' => [45], 'time' => Array(
                0 => Array
                (
                    'matin' => Array
                    ('deb' => "08:00", 'fin' => "13:00"),

                    'soir' => Array
                    (
                        'deb' => "15:00", 'fin' => "23:00")
                ),
                1 => Array(
                    'matin' => Array('deb' => "08:00", 'fin' => "13:00"),

                    'soir' => Array('deb' => "15:00", 'fin' => "23:00")
                ),

                2 => Array
                (
                    'matin' => Array
                    ('deb' =>"08:00", 'fin' => "13:00"), 'soir' => Array
                    ('deb' => "15:00",'fin' => "23:00")
                ),
                3 => Array
                ('matin' => Array(
                        'deb' => "08:00", 'fin' => "13:00"),
                    'soir' => Array
                    ('deb' => "14:00", 'fin' => "23:00")),
                4 => Array('matin' => Array
                ('deb' => "08:00", 'fin' => "13:00"),
                    'soir' => Array
                    ('deb' => "14:00", 'fin' => "23:00")),
                5 => Array('matin' => Array
                ('deb' => "08:00", 'fin' => "13:00"),
                    'soir' => Array
                    ('deb' => "19:00", 'fin' => "23:00")),
                6 => Array('matin' => Array
                ('deb' => "08:00", 'fin' => "13:00")
                )));

        DB::table('establishment')->insert([
            'nameE' => 'Clinique Bon Secours, Gabès',
            'address' => ' Avenue Mongi Slim, 6000 Gabès - Gouvernorat de Tunis, Tunisie',
            'textLatlng' => '33.8846906, 10.101303899999948',
            'email' => 'talmoudi_res@yahoo.fr',
            'tel' => '+21675271400',
            'tel1' => '+21675277700',
            'type_id' => '2',
            'logo' => 'clinique-bon-secours.JPG',
            'horaire' => serialize($tab),

        ]);
    }}
class InsuranceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insurances')->insert([
            'pseudo' => 'cnam',
            'name' => '	Caisse Nationale d\'Assurance Maladie',
            'address' => '12 Abou hamed ghazali, Monplaisir, 1073 Tunis, Gouvernorat de Tunis, Tunisie',
            'email' => 'info@cnam.nat.tn',
            'tel' => '71 104 200',
            'fax' => '71 104 385',
            'green_number' => '80 100 295',
            'web_site' => 'www.cnam.nat.tn',
            'percentage' => '0.6',

        ]);

        DB::table('insurances')->insert([
            'pseudo' => 'cnrps',
            'name' => '	Caisse Nationale de Retraite et de Prévoyance Sociale',
            'address' => '6, Avenue Mohamed V -  1001 Tunis, Gouvernorat de Tunis, Tunisie',
            'email' => 'info@cnrps.nat.tn',
            'tel' => '(+216) 71 259 100',
            'fax' => '(+216) 71 351 531',
            'web_site' => 'www.cnrps.nat.tn',
            'percentage' => '0.5',

        ]);
        DB::table('insurances')->insert([
            'pseudo' => 'Maghrebia',
            'name' => '	Assurances Maghrebia',
            'address' => '64 Rue de La Palestine, 1002 Tunis, Gouvernorat de Tunis, Tunisie',
            'email' => '  marketing@magassur.com.tn',
            'tel' => '(+216) 71 788 800',
            'fax' => '(+216) 71 788 334',
            'web_site' => 'www.maghrebia.com.tn',
            'percentage' => '0.2',

        ]);
        DB::table('insurances')->insert([
            'pseudo' => 'Iloyd',
            'name' => '	Assurances Iloyd  TUNISIEN',
            'address' => 'Immeuble LLOYD- Av.Taher Haddad les Berges du Lac 1053 Tunis, Gouvernorat de Tunis, Tunisie',
            'email' => ' siteweb@lloyd.com.tn',
            'tel' => ' +216 71 96 27 77',
            'fax' => '+216 71 96 24 40',
            'web_site' => 'www.lloyd.com.tn',
            'percentage' => '0.25',

        ]);

    }}
class EstablishmentHasSpecialityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 35,
            'establishment_id' => 2,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 43,
            'establishment_id' => 2,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 44,
            'establishment_id' => 2,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 45,
            'establishment_id' => 2,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 46,
            'establishment_id' => 2,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 64,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 56,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 35,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 16,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 45,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 44,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 43,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 17,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 65,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 27,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 19,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 12,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 26,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 51,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 36,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 46,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 24,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 58,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 55,
            'establishment_id' => 3,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 20,
            'establishment_id' => 2,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 7,
            'establishment_id' => 4,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 8,
            'establishment_id' => 4,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 9,
            'establishment_id' => 4,

        ]);

        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 6,
            'establishment_id' => 5,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 19,
            'establishment_id' => 5,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 44,
            'establishment_id' => 5,

        ]);
        DB::table('establishment_has_speciality')->insert([
            'speciality_id' => 64,
            'establishment_id' => 5,

        ]);
    }}

class IndicatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('indicators')->insert([
            'name'=>'TS',
            'description' => 'Temps de Saignement',
            'unity' => 'min',
            'valUs' => '<8',
        ]);
        DB::table('indicators')->insert([
            'name'=>'TQ',
            'description' => 'Temps de Quick',
            'unity' => '%',
            'valUs' => '75-100%',
        ]);
        DB::table('indicators')->insert([
            'name'=>'INR',
            'description' => 'Ratio International Normalisé',
            'unity' => '',
            'valUs' => '1',
        ]);
        DB::table('indicators')->insert([
            'name'=>'TCA',
            'description' => 'Temps de Céphaline et Activateur',
            'unity' => 'secondes',
            'valUs' => '25-39',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Fib.',
            'description' => 'Fibrinogène',
            'unity' => 'g/l',
            'valUs' => '2-4',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Glucose',
            'description' => 'Glucose',
            'unity' => 'g/l',
            'valUs' => '0.7-1.05',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Protéine',
            'description' => 'Protéine',
            'unity' => 'g/l',
            'valUs' => '64-82',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Acétone',
            'description' => 'Acétone',
            'unity' => 'g/l',
            'valUs' => '0.05',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Sels biliaires',
            'description' => 'Seles biliaires',
            'unity' => 'µg/l',
            'valUs' => '0-4.3',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Pigements biliaires',
            'description' => 'Pigements biliaires',
            'unity' => 'mg/l',
            'valUs' => '3-10',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Sang',
            'description' => 'Examen chimique du sang',
            'unity' => 'mmol/l',
            'valUs' => '0.4-2',
        ]);
        DB::table('indicators')->insert([
            'name'=>'pH',
            'description' => 'pH',
            'unity' => '-',
            'valUs' => '7-8',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Leucocytes',
            'description' => 'Leucocytes',
            'unity' => 'm/mm3',
            'valUs' => '4000-10000',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Hématies',
            'description' => 'Hématies',
            'unity' => 'millions/mm3',
            'valUs' => '4-5',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Cristaux',
            'description' => 'Cristaux',
            'unity' => '-',
            'valUs' => 'absence',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Cylindres',
            'description' => 'Cylindres',
            'unity' => 'µl',
            'valUs' => '<8',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Cellules',
            'description' => 'Cellules',
            'unity' => 'µl',
            'valUs' => '<3',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Levures',
            'description' => 'Levures',
            'unity' => '-',
            'valUs' => 'absence ou non',
        ]);
        DB::table('indicators')->insert([
            'name'=>'parasites',
            'description' => 'parasites',
            'unity' => 'µl',
            'valUs' => '<3',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Hémoglobine',
            'description' => 'Hémoglobine',
            'unity' => 'g/100L',
            'valUs' => '12-17.0',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Hématocrite',
            'description' => 'Hématocrite',
            'unity' => '%',
            'valUs' => '36-52',
        ]);
        DB::table('indicators')->insert([
            'name'=>'VGM',
            'description' => 'taille des globules rouges varie',
            'unity' => 'µ3',
            'valUs' => '80-95',
        ]);
        DB::table('indicators')->insert([
            'name'=>'TCMH',
            'description' => 'Teneur Corpusculaire Moyenne en Hémoglobine',
            'unity' => 'pg',
            'valUs' => '27-32',
        ]);
        DB::table('indicators')->insert([
            'name'=>'CCMH',
            'description' => ' Concentration Corpusculaire Moyenne en Hémoglobine',
            'unity' => 'g/100ml',
            'valUs' => '32-36',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Rétyculocytes',
            'description' => 'Rétyculocytes',
            'unity' => '%',
            'valUs' => '20-80',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Gly',
            'description' => 'Glycémie',
            'unity' => 'mmol/l',
            'valUs' => '4.00-6.00',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Gly à jeun',
            'description' => 'Glycémie à jeun',
            'unity' => 'g/l',
            'valUs' => '<= 1.10',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Crea',
            'description' => 'Creatitine',
            'unity' => 'µmol/l',
            'valUs' => '53-106',
        ]);
        DB::table('indicators')->insert([
            'name'=>'HbA1C',
            'description' => 'Hémoglobine glyquée (HbA1C)',
            'unity' => '%',
            'valUs' => '4-6',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Sodium (Na++)',
            'description' => 'Sodium (Na++)',
            'unity' => 'mmol/l',
            'valUs' => '137-144',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Potassium (K+)',
            'description' => 'Potassium (K+)',
            'unity' => 'mmol/l',
            'valUs' => '3.5-4.5',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Chlores (CL-)',
            'description' => 'Chlores (CL-)',
            'unity' => 'mmol/l',
            'valUs' => '95-110',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Protides',
            'description' => 'Protides',
            'unity' => 'g/l',
            'valUs' => '65-75',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Bicarbonates (HCO3-)',
            'description' => 'Bicarbonates (HCO3-)',
            'unity' => 'g/l',
            'valUs' => '65-75',
        ]);

        DB::table('indicators')->insert([
            'name'=>'Cholesterol',
            'description' => 'Cholesterol',
            'unity' => 'mmol/l',
            'valUs' => '4.00-6.00',
        ]);
        DB::table('indicators')->insert([
            'name'=>'Triglyceride',
            'description' => 'Triglyceride',
            'unity' => 'mmol/l',
            'valUs' => '1.00-2.00',
        ]);
    }}

class AnalysePredefTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('analyses_predef')->insert([
            'name' => 'ionogramme',
        ]);
        DB::table('analyses_predef')->insert([
            'name' => 'diabète',
        ]);
        DB::table('analyses_predef')->insert([
            'name' => 'NFS',
        ]);
        DB::table('analyses_predef')->insert([
            'name' => 'Hémostatie',
        ]);
        DB::table('analyses_predef')->insert([
            'name' => 'ECBU',
        ]);
    }}


class AnalysePredefHasIndicatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '4',
            'indicator_id' => '1',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '4',
            'indicator_id' => '2',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '4',
            'indicator_id' => '3',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '4',
            'indicator_id' => '4',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '4',
            'indicator_id' => '5',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
        'analyse_predef_id' => '5',
        'indicator_id' => '6',
    ]);
        DB::table('analyse_predef_has_indicator')->insert([
        'analyse_predef_id' => '5',
        'indicator_id' => '7',
    ]);
        DB::table('analyse_predef_has_indicator')->insert([
        'analyse_predef_id' => '5',
        'indicator_id' => '8',
    ]);
        DB::table('analyse_predef_has_indicator')->insert([
        'analyse_predef_id' => '5',
        'indicator_id' => '9',
    ]);
        DB::table('analyse_predef_has_indicator')->insert([
        'analyse_predef_id' => '5',
        'indicator_id' => '10',
    ]);
        DB::table('analyse_predef_has_indicator')->insert([
        'analyse_predef_id' => '5',
        'indicator_id' => '11',
    ]);
        DB::table('analyse_predef_has_indicator')->insert([
        'analyse_predef_id' => '5',
        'indicator_id' => '12',
    ]);
        DB::table('analyse_predef_has_indicator')->insert([
        'analyse_predef_id' => '5',
        'indicator_id' => '13',
    ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '5',
            'indicator_id' => '14',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '5',
            'indicator_id' => '15',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '5',
            'indicator_id' => '16',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '5',
            'indicator_id' => '17',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '5',
            'indicator_id' => '18',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '5',
            'indicator_id' => '19',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '3',
            'indicator_id' => '14',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '3',
            'indicator_id' => '14',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '3',
            'indicator_id' => '20',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '3',
            'indicator_id' => '21',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '3',
            'indicator_id' => '22',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '3',
            'indicator_id' => '23',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '3',
            'indicator_id' => '24',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '3',
            'indicator_id' => '13',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '3',
            'indicator_id' => '25',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '2',
            'indicator_id' => '26',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '2',
            'indicator_id' => '27',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '2',
            'indicator_id' => '28',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '2',
            'indicator_id' => '29',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '2',
            'indicator_id' => '30',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '2',
            'indicator_id' => '31',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '2',
            'indicator_id' => '32',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '2',
            'indicator_id' => '33',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '2',
            'indicator_id' => '34',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '1',
            'indicator_id' => '30',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '1',
            'indicator_id' => '31',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '1',
            'indicator_id' => '32',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '1',
            'indicator_id' => '33',
        ]);
        DB::table('analyse_predef_has_indicator')->insert([
            'analyse_predef_id' => '1',
            'indicator_id' => '34',
        ]);

    }}