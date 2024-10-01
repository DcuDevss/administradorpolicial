<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Collection;

class DateTimeAvailability extends Component
{
    public string $date;
    public string $selectedTime = '';

    public array $availableTimes = [];
    public Collection $appointments;

    public function mount()
{
    $this->date = now()->format('Y-m-d');
    $this->getIntervalsAndAvailableTimes(); // Inicializar $availableTimes y $appointments
}
   /* public function updatedDate()
    {
        $this->reset('selectedTime');
        $this->getIntervalsAndAvailableTimes();
    }*/
    public function updatedDate()
{
    if ($this->date !== now()->format('Y-m-d')) {
        $this->reset('selectedTime');
        $this->getIntervalsAndAvailableTimes();
    }
}

    public function render()
    {
        return view('livewire.date-time-availability');
    }

    protected function getIntervalsAndAvailableTimes()
    {
        //$this->reset(['availableTimes', 'appointments']);
        $this->reset('availableTimes');

        $carbonIntervals = Carbon::parse($this->date . ' 8 am')->toPeriod($this->date . ' 8 pm', 1, 'hours');

        $this->appointments = Appointment::whereDate('start_time', $this->date)->get();

        foreach ($carbonIntervals as $interval) {
            $this->availableTimes[$interval->format('hA')] = !$this->appointments->contains('start_time', $interval);
        }
    }

    public function reserve()
    {
        try {
            // Validaciones aquí si es necesario (por ejemplo, asegurarse de que la fecha sea válida)

            $dateTime = Carbon::createFromFormat('Y-m-d hA', $this->date . ' ' . $this->selectedTime);

            $user = auth()->user();

            // Verificar si la hora seleccionada ya está reservada
            if (Appointment::where('start_time', $dateTime)->exists()) {
                session()->flash('error', 'La hora seleccionada ya está reservada.');
            } else {
                // Crear una nueva cita y asociarla al usuario
                $user->appointments()->create([
                    'start_time' => $dateTime,
                ]);

                session()->flash('success', 'Turno reservado exitosamente');
            }

            // Restablecer los valores después de guardar
            $this->reset('selectedTime');
            $this->getIntervalsAndAvailableTimes();
        } catch (\Exception $e) {
            // Manejar cualquier excepción que ocurra durante el proceso de reserva
            session()->flash('error', 'Hubo un problema al reservar el turno. Por favor, inténtalo de nuevo.');
        }
    }
}




/*namespace App\Http\Livewire;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Collection;

class DateTimeAvailability extends Component
{
    public string $date;
    public string $selectedTime = '';

    public array $availableTimes = [];
    public Collection $appointments;

    public function mount()
    {
        $this->date = now()->format('Y-m-d');

        $this->getIntervalsAndAvailableTimes();
    }

    public function updatedDate()
    {
        $this->reset('selectedTime');
        $this->getIntervalsAndAvailableTimes();
    }

    public function render()
    {
        return view('livewire.date-time-availability');
    }

    protected function getIntervalsAndAvailableTimes()
    {
        $this->reset('availableTimes');

        $carbonIntervals = Carbon::parse($this->date . ' 8 am')->toPeriod($this->date . ' 8 pm', 1, 'hours');

        $this->appointments = Appointment::whereDate('start_time', $this->date)->get();

        foreach ($carbonIntervals as $interval) {
            $this->availableTimes[$interval->format('hA')] = !$this->appointments->contains('start_time', $interval);
        }
    }

   //public function reserve()
   // {
        // Validaciones aquí si es necesario
       // $dateTime = Carbon::createFromFormat('Y-m-d hA', $this->date . ' ' . $this->selectedTime);

        //Appointment::create([
           // 'user_id' => auth()->user()->id,
           // 'start_time' => $dateTime,
        //]);

        // Restablecer los valores después de guardar
       // $this->reset('selectedTime');
      //  $this->getIntervalsAndAvailableTimes();
   // }
   // public function reserve()
//{

   // $dateTime = Carbon::createFromFormat('Y-m-d hA', $this->date . ' ' . $this->selectedTime);

    //$user = auth()->user();


    //if (Appointment::where('start_time', $dateTime)->exists()) {
      //  session()->flash('error', 'La hora seleccionada ya está reservada.');
    //} else {

       // $user->appointments()->create([
           // 'start_time' => $dateTime,
        //]);

       // session()->flash('success', 'Turno reservado exitosamente');
   // }


   // $this->reset('selectedTime');
   // $this->getIntervalsAndAvailableTimes();
//}

}*/





/*namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Collection;

class DateTimeAvailability extends Component
{
    public string $date;

    public array $availableTimes = [];

    public Collection $appointments;

    public string $designTemplate = 'tailwind';

    public function mount()
    {
        $this->date = now()->format('Y-m-d');

        $this->getIntervalsAndAvailableTimes();
    }

    public function updatedDate()
    {
        $this->getIntervalsAndAvailableTimes();
    }

    public function render()
    {
        return view('livewire.date-time-availability');
    }

    public function getIntervalsAndAvailableTimes()
    {
        $this->reset('availableTimes');

        $carbonIntervals = Carbon::parse($this->date . ' 8 am')->toPeriod($this->date . ' 8 pm', 1, 'hours');

        $this->appointments = Appointment::whereDate('start_time', $this->date)->get();

        foreach ($carbonIntervals as $interval) {
            $this->availableTimes[$interval->format('hA')] = !$this->appointments->contains('start_time', $interval);
        }
    }

    public function deleteReservation($startTime)
    {
        Appointment::where('start_time', $startTime)->delete();
        $this->getIntervalsAndAvailableTimes(); // Actualiza la lista de horarios disponibles
    }
}*/


/*namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Collection;

class DateTimeAvailability extends Component
{
    public string $date;

    public array $availableTimes = [];

    public Collection $appointments;

    public string $designTemplate = 'tailwind';

    public function mount()
    {
        $this->date = now()->format('Y-m-d');

        $this->getIntervalsAndAvailableTimes();
    }

    public function updatedDate()
    {
        $this->getIntervalsAndAvailableTimes();
    }

    public function render()
    {
        return view('livewire.date-time-availability');
    }

    protected function getIntervalsAndAvailableTimes()
    {
        $this->reset('availableTimes');

        $carbonIntervals = Carbon::parse($this->date . ' 8 am')->toPeriod($this->date . ' 8 pm', 1, 'hours');

        $this->appointments = Appointment::whereDate('start_time', $this->date)->get();

        foreach ($carbonIntervals as $interval) {
            $this->availableTimes[$interval->format('hA')] = !$this->appointments->contains( 'start_time', $interval);;
        }
    }

}*/
