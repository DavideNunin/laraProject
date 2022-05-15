<?php

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
        DB::table('utente')->insert([
            ['nome' => 'Gennaro', 'cognome' => 'Bullo', 'username' => 'gennaro.bullo', 'password' => 'lol', 'tipologia' => 's', 'sesso' => 'M', 'telefono' => '3333333333',],
        ]);

        DB::table('offerta')->insert([
            ['via' => 'via 1', 'ncivico' => 5,
                'genereRichiesto' => 'M', 'citta' => 'Ancona',
                'periodo' => '3 mesi', 'titolo' => 'offerta 1', 'tipologia' => 'a', 'prezzo' => 3000, 'etaRichiesta' => 18,],
                ['via' => 'via 2', 'ncivico' => 6,
                'genereRichiesto' => 'M', 'citta' => 'Ancona',
                'periodo' => '6 mesi', 'titolo' => 'offerta 2', 'tipologia' => 'p', 'prezzo' => 200, 'etaRichiesta' => 18,],
                ['via' => 'via 3', 'ncivico' => 7,
                'genereRichiesto' => 'F', 'citta' => 'Ancona',
                'periodo' => '1 anno', 'titolo' => 'offerta 3', 'tipologia' => 'a', 'prezzo' => 500, 'etaRichiesta' => 18,],
                ['via' => 'via 4', 'ncivico' => 9,
                'genereRichiesto' => 'F', 'citta' => 'Ancona',
                'periodo' => '9 mesi', 'titolo' => 'offertissima', 'tipologia' => 'a', 'prezzo' => 400, 'etaRichiesta' => 18,],
                ['via' => 'via 6', 'ncivico' => 10,
                'genereRichiesto' => 'F', 'citta' => 'Ancona',
                'periodo' => '10 mesi', 'titolo' => 'offerta 5', 'tipologia' => 'p', 'prezzo' => 800, 'etaRichiesta' => 18,]
        ]);
    }
}
