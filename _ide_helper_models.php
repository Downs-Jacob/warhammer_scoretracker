<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Game
 *
 * @property int $id
 * @property string $slug
 * @property int $user_id
 * @property string $scenario
 * @property string $player1_name
 * @property string $player1_army
 * @property string $player1_primary
 * @property string $player1_secondary
 * @property string $player1_score
 * @property string $player2_name
 * @property string $player2_army
 * @property string $player2_primary
 * @property string $player2_secondary
 * @property string $player2_score
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $victory_p1
 * @property int $victory_p2
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Game newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Game query()
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePlayer1Army($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePlayer1Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePlayer1Primary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePlayer1Score($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePlayer1Secondary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePlayer2Army($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePlayer2Name($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePlayer2Primary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePlayer2Score($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game wherePlayer2Secondary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereScenario($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereVictoryP1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Game whereVictoryP2($value)
 */
	class Game extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Game[] $games
 * @property-read int|null $games_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

