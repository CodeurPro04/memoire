<div class="grid grid-cols-2 gap-4">
    <div>
        <label>Prénom</label>
        <input type="text" name="first_name" value="{{ old('first_name', $doctor->first_name) }}" class="input">
    </div>

    <div>
        <label>Nom</label>
        <input type="text" name="last_name" value="{{ old('last_name', $doctor->last_name) }}" class="input">
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $doctor->email) }}" class="input">
    </div>

    <div>
        <label>Téléphone</label>
        <input type="text" name="phone" value="{{ old('phone', $doctor->phone) }}" class="input">
    </div>

    <div>
        <label>Numéro de licence</label>
        <input type="text" name="license_number" value="{{ old('license_number', $doctor->license_number) }}" class="input">
    </div>

    <div>
        <label>Spécialité</label>
        <select name="specialty_id" class="input">
            <option value="">Sélectionner</option>
            @foreach ($specialties as $specialty)
                <option value="{{ $specialty->id }}" {{ old('specialty_id', $doctor->specialty_id) == $specialty->id ? 'selected' : '' }}>
                    {{ $specialty->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label>Années d’expérience</label>
        <input type="number" name="years_of_experience" value="{{ old('years_of_experience', $doctor->years_of_experience) }}" class="input">
    </div>

    <div class="col-span-2">
        <label>Bio</label>
        <textarea name="bio" rows="4" class="input">{{ old('bio', $doctor->bio) }}</textarea>
    </div>

    <div>
        <label>Photo de profil</label>
        <input type="file" name="profile_photo" class="input">
    </div>
</div>
