<div class="nutripass-profile">
    <style>
        .nutripass-profile {
            padding: 40px 32px;
            min-height: calc(100vh - 225px);
            background: #111827;
        }

        .profile-card {
            max-width: 1000px;
            margin: 0 auto;
            background: #1f2937;
            border: 1px solid #374151;
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }

        .profile-title {
            color: #ffffff;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .profile-description {
            color: #9ca3af;
            font-size: 15px;
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            color: #e5e7eb;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-input,
        .form-select {
            width: 100%;
            box-sizing: border-box;
            padding: 12px 14px;
            background: #111827;
            color: #ffffff;
            border: 1px solid #4b5563;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-input:focus,
        .form-select:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.15);
        }

        .form-input::placeholder {
            color: #6b7280;
        }

        .gender-options {
            display: flex;
            gap: 28px;
            flex-wrap: wrap;
        }

        .gender-option {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #d1d5db;
            cursor: pointer;
        }

        .gender-option input {
            width: 16px;
            height: 16px;
            accent-color: #8b5cf6;
            cursor: pointer;
        }

        .error-message {
            color: #f87171;
            font-size: 13px;
            margin-top: 6px;
        }

        .success-message {
            background: rgba(34, 197, 94, 0.12);
            border: 1px solid rgba(34, 197, 94, 0.35);
            color: #86efac;
            padding: 12px 15px;
            border-radius: 10px;
            margin-bottom: 24px;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .save-button {
            border: none;
            background: #8b5cf6;
            color: white;
            padding: 13px 24px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .save-button:hover {
            background: #7c3aed;
            transform: translateY(-1px);
        }

        .save-button:active {
            transform: translateY(0);
        }
    </style>

    <div class="profile-card">

        <h1 class="profile-title">
            Your Nutrition Profile
        </h1>

        <p class="profile-description">
            Tell us a little about yourself so NutriPass can personalize
            your nutrition recommendations.
        </p>

        @if (session()->has('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit="save">

            <!-- AGE -->
            <div class="form-group">
                <label for="age" class="form-label">
                    Age
                </label>

                <input
                    id="age"
                    type="number"
                    wire:model="age"
                    min="13"
                    max="120"
                    class="form-input"
                    placeholder="Enter your age"
                    autocomplete="off"
                >

                @error('age')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- HEIGHT -->
            <div class="form-group">
                <label for="height" class="form-label">
                    Height (cm)
                </label>

                <input
                    id="height"
                    type="number"
                    step="0.01"
                    wire:model="height"
                    min="50"
                    max="250"
                    class="form-input"
                    placeholder="Enter your height in cm"
                    autocomplete="off"
                >

                @error('height')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- WEIGHT -->
            <div class="form-group">
                <label for="weight" class="form-label">
                    Weight (kg)
                </label>

                <input
                    id="weight"
                    type="number"
                    step="0.01"
                    wire:model="weight"
                    min="20"
                    max="300"
                    class="form-input"
                    placeholder="Enter your weight in kg"
                    autocomplete="off"
                >

                @error('weight')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- GENDER -->
            <div class="form-group">
                <label class="form-label">
                    Gender
                </label>

                <div class="gender-options">

                    <label class="gender-option">
                        <input
                            type="radio"
                            name="gender"
                            wire:model="gender"
                            value="male"
                        >
                        <span>Male</span>
                    </label>

                    <label class="gender-option">
                        <input
                            type="radio"
                            name="gender"
                            wire:model="gender"
                            value="female"
                        >
                        <span>Female</span>
                    </label>

                    <label class="gender-option">
                        <input
                            type="radio"
                            name="gender"
                            wire:model="gender"
                            value="other"
                        >
                        <span>Other</span>
                    </label>

                </div>

                @error('gender')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- ACTIVITY LEVEL -->
            <div class="form-group">
                <label for="activity_level" class="form-label">
                    Activity Level
                </label>

                <select
                    id="activity_level"
                    wire:model="activity_level"
                    class="form-select"
                >
                    <option value="">Select your activity level</option>
                    <option value="sedentary">
                        Sedentary — little or no exercise
                    </option>
                    <option value="light">
                        Lightly Active — exercise 1–3 days/week
                    </option>
                    <option value="moderate">
                        Moderately Active — exercise 3–5 days/week
                    </option>
                    <option value="active">
                        Very Active — exercise 6–7 days/week
                    </option>
                    <option value="very_active">
                        Extremely Active — intense daily exercise
                    </option>
                </select>

                @error('activity_level')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- DIETARY PREFERENCE -->
            <div class="form-group">
                <label for="dietary_preference" class="form-label">
                    Dietary Preference
                </label>

                <select
                    id="dietary_preference"
                    wire:model="dietary_preference"
                    class="form-select"
                >
                    <option value="">Select your dietary preference</option>
                    <option value="vegetarian">Vegetarian</option>
                    <option value="non_vegetarian">Non-Vegetarian</option>
                    <option value="vegan">Vegan</option>
                    <option value="eggetarian">Eggetarian</option>
                    <option value="pescatarian">Pescatarian</option>
                    <option value="other">Other</option>
                </select>

                @error('dietary_preference')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- GOAL -->
            <div class="form-group">
                <label for="goal" class="form-label">
                    Nutrition Goal
                </label>

                <select
                    id="goal"
                    wire:model="goal"
                    class="form-select"
                >
                    <option value="">Select your goal</option>
                    <option value="weight_loss">Weight Loss</option>
                    <option value="weight_gain">Weight Gain</option>
                    <option value="muscle_gain">Muscle Gain</option>
                    <option value="maintenance">Maintain Weight</option>
                    <option value="healthy_eating">Healthy Eating</option>
                </select>

                @error('goal')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- BUTTON -->
            <div class="button-container">
                <button
                    type="submit"
                    class="save-button"
                >
                    Save Nutrition Profile
                </button>
            </div>

        </form>

    </div>
</div>