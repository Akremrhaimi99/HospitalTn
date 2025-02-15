<!-- resources/views/dashboard.blade.php -->  
<x-app-layout >  
    <x-slot name="header" >  
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight" style="font-size: 1.2rem; font-weight: bold;color: white">  
            {{ __('Dashboard') }}  
        </h2>  
    </x-slot>  

    <div class="py-12">  
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">  
            <div style="padding: 32px; background-color: #ccffcc; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">  
                <h1 style="font-size: 3rem; font-weight: bold; color: #333; text-align: center;">  
                    {{ __('Welcome, ') . auth()->user()->name }}  
                </h1>  

                @if(auth()->user()->role === 'admin')  
                    <h2 style="font-size: 2.5rem; font-weight: semi-bold; color: #333; text-align: center; margin-top: 20px;">  
                        Admin Dashboard  
                    </h2>  
                    <ul style="text-align: left; margin: 120px 0 0 40px;">  
                        <li>  
                            <a href="{{ route('admin.manage_users') }}" style="color: #45a049; text-decoration: none; font-size: 1.25rem;">  
                                {{ __('Manage Users') }}  
                            </a>  
                        </li>  
                    </ul>  
                @elseif(auth()->user()->role === 'doctor')  
                    <h2 style="font-size: 2.5rem; font-weight: semi-bold; color: #333; text-align: center; margin-top: 20px;">  
                        Doctor Dashboard  
                    </h2>  
                    <ul style="text-align: left; margin: 120px 0 0 40px;">  
                        <li>  
                            <a href="{{ route('doctor.appointments') }}" style="color: #45a049; text-decoration: none; font-size: 1.25rem;">  
                                {{ __('View Appointments') }}  
                            </a>  
                        </li>  
                    </ul>  
                @elseif(auth()->user()->role === 'patient')  
                    <h2 style="font-size: 2.5rem; font-weight: semi-bold; color: #333; text-align: center; margin-top: 20px;">  
                        Patient Dashboard  
                    </h2>  
                    <ul style="text-align: left; margin: 120px 0 0 40px;">  
                        <li>  
                            <a href="{{ route('patient.appointments.create') }}" style="color:#45a049; text-decoration: none; font-size: 1.25rem;">  
                                {{ __('Request an Appointment') }}  
                            </a>  
                        </li>  
                        <li>  
                            <a href="{{ route('patient.appointments') }}" style="color:#45a049; text-decoration: none; font-size: 1.25rem;">  
                                {{ __('View My Appointments') }}  
                            </a>  
                        </li>  
                    </ul>  
                @else  
                    <h2 style="font-size: 2.5rem; font-weight: semi-bold; color: #333; text-align: center; margin-top: 20px;">  
                        General User Dashboard  
                    </h2>  
                @endif  
            </div>  
        </div>  
    </div>  
</x-app-layout>