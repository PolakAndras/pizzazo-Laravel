<?php

        return [
            //A validáció kiszervezése
            
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4|max:30|confirmed',
            'phone' => 'required|string|min:6|max:30',

            // Kötelező szállítási adatok
            'zip' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'street' => 'required|string|max:100',
            'houseNumber' => 'required|string|max:100',

            // Nem kötelező
            'floor_door' => 'nullable|string|max:50',
            'doorbell' => 'nullable|string|max:100',
            'elseData' => 'nullable|max:600',

            'accepted_terms' => 'accepted',

        ];