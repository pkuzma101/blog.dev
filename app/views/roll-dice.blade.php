@extends('layouts.master')

@section('content')

    <h1><?php echo "The Dice say " . $roll; ?></h1>
    <h1><?php echo "Your guess was " . $guess; ?></h1>
    <h2>
    	@if($roll == $guess)
    		<p>You win!</p>
    	@else
    		<p>You lose!</p>
    	@endif
    </h2> 
    @stop
