<?php

namespace App\Livewire;

use App\Models\Comments;
use App\Models\RealEstate;
use Livewire\Component;
use App\Models\Rentals;
class Stats extends Component
{
    public $rentalID;
    public $rentals;
    public function mount($rentalID = null)
    {
        $this->rentalID = $rentalID;
        // Datos mock
        // $this->rentals = [
        //     ['id' => '1', 'user_id' => '1', 'name' => 'Rental 1', 'rent_start' => '2024-01-01', 'rent_end' => '2024-02-12', 'reason_end' => null, 'created_at' => '24-12-10T10:44:27.000000Z', 'updated_at' => '24-12-10T10:44:27.000000Z'],
        //     ['id' => '2', 'user_id' => '2', 'name' => 'Rental 2', 'rent_start' => '2024-15-11', 'rent_end' => '2024-16-12', 'reason_end' => null, 'created_at' => '24-12-10T10:46:15.000000Z', 'updated_at' => '24-12-10T10:46:15.000000Z'],
        //     ['id' => '3', 'user_id' => '3', 'name' => 'Rental 3', 'rent_start' => '2024-22-06', 'rent_end' => '2024-30-12', 'reason_end' => null, 'created_at' => '24-12-10T10:48:03.000000Z', 'updated_at' => '24-12-10T10:48:03.000000Z'],
        //     ['id' => '4', 'user_id' => '4', 'name' => 'Rental 4', 'rent_start' => '2024-23-02', 'rent_end' => '2024-31-12', 'reason_end' => null, 'created_at' => '24-12-10T10:50:17.000000Z', 'updated_at' => '24-12-10T10:50:17.000000Z'],
        //     ['id' => '5', 'user_id' => '5', 'name' => 'Rental 5', 'rent_start' => '2024-04-12', 'rent_end' => '2024-31-12', 'reason_end' => null, 'created_at' => '24-12-10T10:52:09.000000Z', 'updated_at' => '24-12-10T10:52:09.000000Z'],
        // ];
        $rentals = Rentals::where('id_real_estate', $rentalID)->get()->toArray();
        $rentals = array_filter($rentals, function($rental) {
            return !is_null($rental['rent_end']);
        });
        foreach ($rentals as &$rental) {
            $rental['name'] = "Rental " . $rental['id'];
            $rental['comments'] = Comments::where('id_rentals', $rental['id'])->get()->toArray();
        }
        $this->rentals = $rentals;
        
        // Reformatear fechas
        $rentals = $this->reformatRentalDates($this->rentals);
    }

    /**
     * Reformatea las fechas de los rentals.
     *
     * @param array $rentals
     * @return array
     */
    private function reformatRentalDates(array $rentals): array
    {
        foreach ($rentals as &$rental) {
            if ($rental['rent_start']) {
                $rental['rent_start'] = $this->reformatDate($rental['rent_start']);
            }
            if ($rental['rent_end']) {
                $rental['rent_end'] = $this->reformatDate($rental['rent_end']);
            }
        }
        return $rentals;
    }

    /**
     * Reformatea una fecha del formato YYYY-DD-MM al formato MM-DD-YYYY.
     *
     * @param string $date
     * @return string
     */
    private function reformatDate(string $date): string
    {
        $parsedDate = \DateTime::createFromFormat('Y-d-m', $date);
        return $parsedDate ? $parsedDate->format('m-d-Y') : $date;
    }

    public function render()
    {
        return view('livewire.stats');
    }
}
